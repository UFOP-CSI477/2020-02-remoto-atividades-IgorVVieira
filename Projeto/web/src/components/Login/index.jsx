import React, { useState } from 'react';
import { Form, Button } from 'react-bootstrap';
import { toast } from 'react-toastify';
import { useHistory } from 'react-router-dom';

import './Login.css';

import api from '../../services/api';
import { login } from '../../services/auth';

const Login = () => {
    const [matricula, setMatricula] = useState('');
    const [password, setPassword] = useState('');

    const history = useHistory();

    async function handleSubmit(event) {
        event.preventDefault();
        try {
            const response = await api.post('/login', { matricula, password });
            toast.success('Login realizado com sucecesso.', {
                position: "top-center",
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                draggable: true,
                progress: 0,
            });
            login(response.data);
            console.log(response.data);
            history.push('/teste');
        } catch (error) {
            toast.error('Login ou senha inválidos. Tente novamente.', {
                position: "top-center",
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                draggable: true,
                progress: 0,
            });
        }
    }

    return (
        <div className="Form">
            <Form onSubmit={handleSubmit}>
                <h1 className="text-center text-light">Login</h1>
                <Form.Group controlId="matricula" className="text-light">
                    <Form.Label>Matrícula</Form.Label>
                    <Form.Control
                        autoFocus
                        type="text"
                        value={matricula}
                        required
                        onChange={(e) => setMatricula(e.target.value)}
                    />
                </Form.Group>
                <Form.Group controlId="password" className="text-light">
                    <Form.Label>Senha</Form.Label>
                    <Form.Control
                        type="password"
                        value={password}
                        required
                        onChange={(e) => setPassword(e.target.value)}
                    />
                </Form.Group>
                <Button variant="success" className="mt-2" block type="submit">
                    Login
                </Button>
            </Form>
        </div>
    );
}

export default Login;