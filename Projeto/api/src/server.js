import 'dotenv/config';
import app from './app';

const port = 3333 || process.env.PORT;

app.listen(port, () => {
    console.log(`Servidor rodando na porta: ${port}`);
});