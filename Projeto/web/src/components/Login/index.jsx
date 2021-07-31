import React, { useState } from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import { toast } from 'react-toastify'

import './Login.css';

import api from '../../services/api';

const Login = () => {
    const [matricula, setMatricula] = useState("");
    const [password, setPassword] = useState("");

    function handleSubmit(event) {
        event.preventDefault();
        const data = {
            matricula, password,
        }
        toast.success('Login realizado com sucecesso.', {
            position: "top-center",
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: 0,
        });
        // try {
        //     const response = await api.post('/users/login', data);
        //     console.log(response);
        // } catch (error) {

        // }
    }

    return (
        <div className="Login">
            <Form onSubmit={handleSubmit}>
                <Form.Group size="lg" controlId="matricula">
                    <Form.Label>Matrícula</Form.Label>
                    <Form.Control
                        autoFocus
                        type="text"
                        value={matricula}
                        required
                        onChange={(e) => setMatricula(e.target.value)}
                    />
                </Form.Group>
                <Form.Group size="lg" controlId="password">
                    <Form.Label>Senha</Form.Label>
                    <Form.Control
                        type="password"
                        value={password}
                        required
                        onChange={(e) => setPassword(e.target.value)}
                    />
                </Form.Group>
                <Button className="mt-2" block size="lg" type="submit">
                    Login
                </Button>
            </Form>
        </div>
    );
}

export default Login;