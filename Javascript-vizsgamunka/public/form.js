class Form {
    constructor(config) {
        this.config = config;
        this.form = document.createElement('form');
        this.form.name = config.name;
        this.form.action = config.url;
        this.form.method = config.method;
        this.fields = [];
    }

    render() {      
        const container = document.querySelector(this.config.renderTo);
        container.innerHTML = '';
        this.loadValues();
        this.config.columns.forEach(column => {
            const columnDiv = document.createElement('div');
            column.fields.forEach(field => {
                const fieldElement = this.createField(field);
                columnDiv.appendChild(fieldElement);
            });
            this.form.appendChild(columnDiv);
        });
        container.appendChild(this.form);
        this.addSubmitListener();
    }
    
    loadValues() {
        const savedData = localStorage.getItem('formData');
        if (savedData) {
            this.setValues(JSON.parse(savedData));
        } else {
            this.clearValues();
        }
    }
    
    clearValues() {
        this.fields.forEach(field => {
            const element = field.element.querySelector('input, select, textarea');
            if (element) {
                if (element.type === 'text' || element.tagName === 'TEXTAREA') {
                    element.value = '';
                } else if (element.type === 'radio' || element.type === 'checkbox') {
                    element.checked = false;
                }
            }
        });
    }

    createField(field) {
        let fieldElement;
        if (field.type === 'text') {
            fieldElement = document.createElement('div');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = field.name;
            input.placeholder = field.label;
            fieldElement.appendChild(input);
        } else if (field.type === 'select') {
            fieldElement = document.createElement('div');
            const selectLabel = document.createElement('p');
            selectLabel.innerHTML = `<strong>${field.label}</strong>`;
            fieldElement.appendChild(selectLabel);

            const selectElement = document.createElement('select');
            selectElement.name = field.name;
            selectElement.id = field.name;
            field.options.forEach(optionValue => {
                const optionElement = document.createElement('option');
                optionElement.value = optionValue.toLowerCase();
                optionElement.textContent = optionValue;
                selectElement.appendChild(optionElement);
            });
            fieldElement.appendChild(selectElement);
        } else if (field.type === 'radio') {
            fieldElement = document.createElement('div');
            if (field.label) {
                const radioLabel = document.createElement('p');
                radioLabel.innerHTML = `<strong>${field.label}</strong>`;
                fieldElement.appendChild(radioLabel);
            }

            field.options.forEach(option => {
                const optionDiv = document.createElement('div');
                const input = document.createElement('input');
                input.type = 'radio';
                input.name = field.name;
                input.id = option.id;
                input.value = option.id;
                const label = document.createElement('label');
                label.htmlFor = option.id;
                label.textContent = option.label;
                optionDiv.appendChild(input);
                optionDiv.appendChild(label);
                fieldElement.appendChild(optionDiv);
            });
        } else if (field.type === 'textarea') {
            fieldElement = document.createElement('div');
            const messageLabel = document.createElement('label');
            messageLabel.setAttribute('for', 'message');
            fieldElement.appendChild(messageLabel);

            const textarea = document.createElement('textarea');
            textarea.name = 'message';
            textarea.rows = 10;
            textarea.placeholder = 'Ide írhat megjegyzést a fordítandó anyaggal kapcsolatban...';
            fieldElement.appendChild(textarea);
        } else if (field.type === 'button') {
            fieldElement = document.createElement('div');
            fieldElement.className = 'button-wrapper';

            const button = document.createElement('button');
            button.type = 'submit';
            button.innerText = field.text;
            button.style.padding = '15px';
            button.style.margin = '30px 0 0 0';
            button.style.backgroundColor = '#002d6d'; 
            button.style.color = '#ffffff'; 
            fieldElement.appendChild(button);
        }
        this.fields.push({ element: fieldElement, config: field });
        return fieldElement;
    }
    
    addSubmitListener() {
        this.form.addEventListener('submit', event => {
            event.preventDefault();
            if (this.validate()) {
                this.submit();
            }
        });
    }

    validate() {
        let valid = true;
        this.fields.forEach(field => {
            const element = field.element.querySelector('input, select, textarea');
            const config = field.config;
            if (config.require) {
                if (config.type === 'radio') {
                    const radioGroup = field.element.querySelectorAll('input[type="radio"]');
                    let radioChecked = false;
                    radioGroup.forEach(radio => {
                        if (radio.checked) {
                            radioChecked = true;
                        }
                    });
                    if (!radioChecked) {
                        alert(config.errormessage || 'Válassza ki az igényelt szolgáltatást!');
                        valid = false;
                    }
                } else if (element) {
                    const value = element.value;
                    if (!value) {
                        alert(config.errormessage || 'A mező kitöltése kötelező!');
                        valid = false;
                    } else if (config.minLength && value.length < config.minLength) {
                        alert(config.errormessage);
                        valid = false;
                    } else if (config.reg && !config.reg.test(value)) {
                        alert(config.errormessage);
                        valid = false;
                    }
                }
            }
        });
        return valid;
    }    
    
    submit() {
        const data = this.getValues();
        let url = this.config.url;
        let method = this.config.method;
        let savedData = JSON.parse(localStorage.getItem('formData')) || {};
    
        if (data.id && savedData[data.id]) {
            savedData[data.id] = data;
        } else {
            const newId = new Date().getTime();
            data.id = newId;
            savedData[newId] = data;
        }
    
        localStorage.setItem('formData', JSON.stringify(savedData));
    
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': this.config.dataType
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(error => {
                    throw new Error(error.error || 'Hiba');
                });
            }
            return response.json();
        })
        .then(result => {
            this.showResult(result, data);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Az űrlap beküldése nem sikerült: ' + error.message);
        });
    }    

    getValues() {
        const values = {};
        this.fields.forEach(field => {
            const element = field.element.querySelector('input, select, textarea');
            if (element) {
                if (element.type === 'radio') {
                    const checkedRadio = field.element.querySelector('input[type="radio"]:checked');
                    if (checkedRadio) {
                        values[field.config.name] = checkedRadio.value;
                    }
                } else {
                    values[field.config.name] = element.value;
                }
            }
        });
        return values;
    }    

    setValues(data) {
        this.fields.forEach(field => {
            const element = field.element.querySelector('input, select, textarea');
            if (element && data[field.config.name]) {
                element.value = data[field.config.name];
            }
        });
    }

    showResult(result, formData) {
        const container = document.querySelector(this.config.renderTo);
        container.innerHTML = `<p>Sikeresen elküldte az árajánlatkérését!</p>
            <button style="padding: 15px; margin: 30px 0 0 0; background-color: #002d6d; color: #ffffff;" 
                onclick='showForm(null, ${JSON.stringify(formData).replace(/'/g, "\\'")})'>Úrlap javítása</button>
            <button style="padding: 15px; margin: 30px 0 0 0; background-color: #002d6d; color: #ffffff;" 
                onclick="localStorage.removeItem('formData'); showStart()">Vissza a kezdőoldalra</button>`;
    }        
}

function showForm(id = null, formData = null) {
    document.querySelector('#content').innerHTML = '';
    const form = new Form({
        name: 'myForm',
        url: '/data',
        method: id ? 'PATCH' : 'POST',
        dataType: 'application/json',
        renderTo: '#content',
        columns: [{
            fields: [
                {
                    name: 'name',
                    type: 'text',
                    label: 'Név: Kis Annamária',
                    require: true,
                    minLength: 3,
                    errormessage: "A mezőnek minimum 3 karakterből kell állnia!"
                },
                {
                    name: 'email',
                    type: 'text',
                    label: 'E-mail cím: valami@gmail.com',
                    require: true,
                    reg: /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/,
                    errormessage: "Helytelen e-mail cím!"
                },
                {
                    name: 'phone',
                    type: 'text',
                    label: 'Telefonszám: +36201234567',
                    require: true,
                    reg: /^(\+36|06)[0-9]0\d{7}$/,
                    errormessage: "Nem megfelelő formátum!"
                },
                {
                    name: 'language1',
                    type: 'select',
                    label: 'Milyen nyelvről?',
                    require: true,
                    options: [
                        "Magyar", "Német", "Angol", "Francia", "Lengyel", "Olasz", "Szlovák",
                        "Szlovén", "Horvát", "Szerb", "Román", "Cseh", "Orosz", "Ukrán", "Spanyol", "Török"
                    ],
                    errormessage: "Válassza ki, hogy milyen nyelvről szeretne fordíttatni!"
                },
                {
                    name: 'language2',
                    type: 'select',
                    label: 'Milyen nyelvre?',
                    require: true,
                    options: [
                        "Magyar", "Német", "Angol", "Francia", "Lengyel", "Olasz", "Szlovák",
                        "Szlovén", "Horvát", "Szerb", "Román", "Cseh", "Orosz", "Ukrán", "Spanyol", "Török"
                    ],
                    errormessage: "Válassza ki, hogy milyen nyelvre szeretne fordíttatni!"
                },
                {
                    name: 'szolgaltatas',
                    type: 'radio',
                    label: 'Igényelt szolgáltatás:',
                    require: true,
                    options: [
                        { id: 'forditas', label: 'Fordítás' },
                        { id: 'tolmacsolas', label: 'Tolmácsolás' },
                        { id: 'lektoralas', label: 'Lektorálás' }
                    ]
                },
                {
                    name: 'message',
                    type: 'textarea'  
                },
                {
                    name: 'aszf',
                    type: 'radio',
                    label: 'Az Általános Szerződési Feltételeket és az Adatvédelmi Tájékoztatót',
                    require: true,
                    options: [
                        { id: 'ok', label: 'elolvastam és elfogadom.' }
                    ],
                    errormessage: "Az ÁSZF és az Adatvédelmi Tájékoztató elfogadása kötelező!"
                },
                {
                    name: 'submit',
                    type: 'button',
                    text: 'Elküld'
                }
            ]
        }]
    });
    form.render();
    if (formData) {
        form.setValues(formData);
    }
}
function showStart() {
    const container = document.querySelector('#content');
    container.innerHTML = `
            <p><strong>Ide kattintva töltheti ki az űrlapot</strong></p> 
            <center><img id="nyil" src="../img/blue-arrow.png" alt="Lent"></center>
            <button id='ajanlatGomb' onclick="showForm()">Árajánlatot kérek!</button>
    `;
}

showStart();