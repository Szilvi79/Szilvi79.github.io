const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();

app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/media', express.static(path.join(__dirname, 'media')));
app.use('/img', express.static(path.join(__dirname, 'img')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'arajanlat.html'));     
});

app.post('/data', (req, res) => {
    const newData = req.body;       // új adatok 

    const dataFilePath = path.join(__dirname, 'data', 'data.json');     // útvonal
    let data = [];

    if (fs.existsSync(dataFilePath)) {      // létezik?
        const fileData = fs.readFileSync(dataFilePath, 'utf8');     // beolvasás
        try {
            data = JSON.parse(fileData);        // adatok JSON-ná alakítása
        } catch (e) {
            console.error('Hiba az adat feldolgozásakor:', err);        
            return res.status(404).json({ error: 'Nem sikerült az adatok feldolgozása.' });     
        }
    }

    const newId = data.length > 0 ? data[data.length - 1].id + 1 : 1;
    newData.id = newId;
    data.push(newData);

    try {
        fs.writeFileSync(dataFilePath, JSON.stringify(data, null, 2));
    } catch (err) {
        console.error('Hiba a JSON írásakor:', err);
        return res.status(404).json({ error: 'Nem sikerült a JSON adatok írása.' });
    }

    res.json(newData);
});

app.patch('/data/:id', (req, res) => {
    const updatedData = req.body;       // javított adatok  
    const id = parseInt(req.params.id, 10);     
    const dataFilePath = path.join(__dirname, 'data', 'data.json');     

    if (fs.existsSync(dataFilePath)) {      // létezik?
        const fileData = fs.readFileSync(dataFilePath, 'utf8');     // beolvasás
        try {   
            let data = JSON.parse(fileData);        // Az adatok JSON-ná alakítása
            const index = data.findIndex(d => d.id === id);     
            if (index !== -1) {
                data[index] = updatedData;
                fs.writeFileSync(dataFilePath, JSON.stringify(data, null, 2));      // Az adatok visszaírása a fájlba
                res.json(updatedData);      
            } else {
                res.status(404).json({ error: 'Adat nem található' });        
            }
        } catch (err) {
            console.error('Hiba a JSON feldolgozásakor:', err);     
            res.status(404).json({ error: 'Nem sikerült az adatok feldolgozása.' });        
        }   
    } else {
        res.status(404).json({ error: 'Nem található adat.' });     
    }
});

app.listen(3000);
