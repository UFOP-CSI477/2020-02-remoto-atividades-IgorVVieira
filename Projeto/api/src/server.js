import express from 'express';
import 'dotenv/config';

import './database';

const port = process.env.PORT;
const app = express();
app.use(express.json());

app.listen(port, () => {
    console.log(`Servidor rodando na porta: ${port}`);
});