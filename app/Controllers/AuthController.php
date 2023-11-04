<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    private object $model;
    public function logupAction()
    {
        \helper('form');

        $post = $this->request->getPost(['name', 'email', 'password', 'password2']);
        $validData = $this->validateData($post, ['name' => 'required|min_length[3]', 'email' => 'required|valid_email', 'password' => 'required|min_length[6]', 'password2' => 'required|matches[password]'], ['name' => ['required' => 'O campo é obrigatório', 'nim_length' => 'O campo deve ter pelo menos 3 caracteres'], 'email' => ['required' => 'O campo é obrigatório', 'valid_email' => 'O campo deve ser um email válido'], 'password' => ['required' => 'O campo é obrigatório', 'min_length' => 'O campo deve ter pelo menos 6 caracteres'], 'password2' => ['required' => 'O campo é obrigatório', 'matches' => 'As senhas não combinam']]);
        if ($this->request->getMethod() == 'post' && $validData) {
            $this->model = new UsersModel();
            $result = $this->model->addUser($post['name'], md5($post['email']), md5($post['password']));
            if ($result) {
                return redirect()->to("login");
            }
            
            return \redirect()->route('logup')->withInput()->with('bad_email', 'Email em uso') ;
        }

            return \redirect()->route('logup')->withInput()->with('errors', \session()->setTempdata('err', $this->validator->getErrors(), 10)); 
    }

    public function loginAction()
    {
        helper('form');
        $post = $this->request->getPost(['email', 'password']);
        $validData = $this->validateData($post, 
            ['email' => 'required|valid_email', 'password' => 'required|min_length[6]'], ['email' => ['required' => 'O campo é obrigatório', 'valid_email' => 'Insira um email válido'], 'password' => ['required' => 'O campo é obrigatório', 'min_length' => 'O campo deve ter pelo menos 6 caracteres']]);
        if ($this->request->getMethod() === 'post' && $validData) {
            $this->model = new UsersModel();
            $foundUser = $this->model->getUser(md5($post['email']), md5($post['password']));
            
            if ($foundUser) {
                \session()->set(['id' => $foundUser['id'], 'nome' => $foundUser['nome']]);
                return \redirect()->route('home');
            }

            return \redirect()->route('login')->withInput()->with('bad_email', 'Usuário e/ou senha não cadastrados');
        }

        return \redirect()->route('login')->withInput()->with('errors', \session()->setTempdata('err', $this->validator->getErrors(), 10)); 
    }

    public function logout()
    {
        \session()->destroy();
        return \redirect()->route('login');
    }
}
