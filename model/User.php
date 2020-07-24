<?php
require "../config/conexion.php";
class User
{

	public function store($name, $surname, $email, $password, $role, $image)
	{
		$sql = "INSERT INTO users (name,surname,email,password,role,status,image)
		VALUES ('$name','$surname','$email','$password','$role',1,'$image')";
		return ejecutarConsulta($sql);
	}

	public function update($id, $name, $surname, $email, $password, $role, $image)
	{
		$sql = "UPDATE users 
		SET id='$id',name='$name',surname='$surname',email='$email',password='$password',role='$role',image='$image' 
		WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	public function destroy($id)
	{
		$sql = "DELETE FROM users  WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	public function statu($id, $status)
	{
		if ($status == 1) {
			$sql = "UPDATE users SET status='0' WHERE id='$id'";
		} else {
			$sql = "UPDATE users SET status='1' WHERE id='$id'";
		}
		return ejecutarConsulta($sql);
	}

	public function show($id)
	{
		$sql = "SELECT id,name,surname,email,password,role,status,image 
		FROM users
		WHERE id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function index()
	{
		$sql = "SELECT * FROM users";
		return ejecutarConsulta($sql);
	}

	public function login($email, $password)
	{
		$sql = "SELECT id,name,surname,email,password,role,status,image 
		FROM users 
		WHERE email='$email' AND password='$password' AND status='1'";
		return ejecutarConsulta($sql);
	}
}