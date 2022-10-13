@extends('layouts.template')
@section('title') Inicio @endsection

@section('content')
    <section>
        <div>
            <div>
                <h3>GET</h3>
                <div>
                    <h4>Request</h4>
                    <p>End-point: /api/users</p>
                    <p>Headers: X-AUTH:{token-autorizacion}</p>
                </div>
                <div>
                    <h4>Response</h4>
                    <p>descripcion: devuelve todos los usuarios almacenados en la base de datos</p>
                    <p>Codigos: 200 OK, 401 No autorizado</p>
                </div>
            </div>
            <div>
                <h3>POST</h3>
                <div>
                    <h4>Request</h4>
                    <p>End-point: /api/users</p>
                    <p>Headers: X-AUTH:{token-autorizacion}</p>
                    <p>body: ['nombre'=>{value},'apellido'=>{value}, 'email'=>{value}]</p>
                </div>
                <div>
                    <h4>Response</h4>
                    <p>descripcion: Devuelve el id del nuevo usuario almacenado en la base de datos</p>
                    <p>Codigos: 201 Usuario creado, 400 La solicitud contiene un error ,401 No autorizado</p>
                </div>
            </div>
            <div>
                <h3>PUT</h3>
                <div>
                    <h4>Request</h4>
                    <p>End-point: /api/users</p>
                    <p>Headers: X-AUTH:{token-autorizacion}</p>
                    <p>body: ['id'=>{value}, '{campo1}'=>{new value}, '{campo2}'=>{new value}, '{campo3}'=>{new value}...]</p>
                </div>
                <div>
                    <h4>Response</h4>
                    <p>descripcion: N/A</p>
                    <p>Codigos: 200 OK, 400 La solicitud contiene un error , 401 No autorizado, 404 No se encontro al usuario</p>
                </div>
            </div>
            <div>
                <h3>DELETE</h3>
                <div>
                    <h4>Request</h4>
                    <p>end-point: /api/users</p>
                    <p>Headers: X-AUTH:{token-autorizacion}</p>
                    <p>body: ['id'=>{value}]</p>
                </div>
                <div>
                    <h4>Response</h4>
                    <p>descripcion: Devuelve el id del usuario eliminado</p>
                    <p>Codigos: 200 OK, 400 La solicitud contiene un error , 401 No autorizado, 404 No se encontro al usuario</p>
                </div>
            </div>
        </div>
    </section>
@endsection