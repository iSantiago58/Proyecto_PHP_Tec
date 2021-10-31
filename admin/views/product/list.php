<section id="middle">
    <header id="page-header">
        <h1>Productos</h1>
    </header>
    <div id="content" class="padding-20">
        <?if(isset($msj)){
            print $msj;
        }?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive margin-bottom-30">
                    <div class="margin-bottom-10">
                        <a href="<?=PROJECT?>product/add" class="btn btn-primary">Agregar</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_sample">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col" class="text-center">Imagen</th>
                            <th scope="col">Activo</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                    
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <img src="" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" checked onclick="changeProductStatus()">
                                            <span class="switch-label" data-on="SI" data-off="NO"></span>
                                        </label>
                                    </td>
                                    <td class="text-center"><a href="">Editar</a></td>
                                  
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>