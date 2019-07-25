<nav class="navbar navbar-inverse" style="border-radius:0">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand"  href="/">CooperSystem - Wandre Alkimin</a>
        </div>
        <ul class="nav navbar-nav" >
            <li> <a href="/">Home</a></li>
            <li> <a href="/pedido">Pedidos</a></li>
            <li> <a href="/admin/produtos">Admin</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div  id="msg">
        @if(Session::has('msg'))
            <div class="alert alert-success alert-dismissable">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('msg')}}
            </div>
        @endif
        @if(Session::has('msgErro'))
            <div class="alert alert-danger alert-dismissable">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('msgErro')}}
            </div>
        @endif
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>




