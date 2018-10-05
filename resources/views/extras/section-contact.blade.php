<div class="section section-contacts">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
        <h2 class="text-center title">¿Aún no te has registrado?</h2>
        <h4 class="text-center description">Registrate ingresando tus datos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
        <form class="contact-form" method="GET" action="{{route('register')}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nombre completo...</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tu Correo</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4 ml-auto mr-auto text-center">
                <button type="submit" class="btn btn-primary btn-raised">
                Registrate
                </button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
