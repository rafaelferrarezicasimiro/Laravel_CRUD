<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body>
    <div ng-controller="myCtrl">
        <div class="container">
            <table class="table top50">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>nome</td>
                        <td>cpf</td>
                        <td>email</td>
                        <td>telefone</td>
                        <td>data_nasc</td>
                        <td>ativo</td>
                        <td>data_desativou</td>
                        <td>created_at</td>
                        <td>updated_at</td>
                        <td>editar</td>
                        <td>excluir</td>
                    </tr>
                </thead>
                <tbody>                
                    <tr ng-repeat="c in clientes">
                        <td>@{{c.id}}</td>
                        <td>@{{c.nome}}</td>
                        <td>@{{c.cpf}}</td>
                        <td>@{{c.email}}</td>
                        <td>@{{c.telefone}}</td>
                        <td>@{{c.data_nasc}}</td>                      
                        <td>@{{c.ativo ? 'Ativa' : 'Inativo'}}</td>
                        <td>@{{c.data_desativou}}</td>
                        <td>@{{c.created_at}}</td>
                        <td>@{{c.updated_at}}</td>
                        <td><button ng-click="alterar(c.id)" ng-disabled="!c.ativo">Editar</button></td>
                        <td><button ng-click="desativar(c.id)" ng-disabled="!c.ativo">Desativar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button ng-click="criar()">Novo</button>
    </div>


    <script>
        var app = angular.module('myApp', []);

        app.controller('myCtrl', function($scope, $http) {
            $scope.criar = function() {
                window.location.href = 'clientes/criar';
            }

            $scope.alterar = function(id) {
                window.location.href = 'clientes/alterar/' + id;
            }
            
            $http.get("clientes/listar")
                .then(function(response) {
                    setTimeout(function() {
                        $scope.$apply(function() {
                            $scope.clientes = response.data;
                        });
                    }, 0);
                });
            
            $scope.desativar = function(id) {
                $http.post("clientes/desativar/" + id)
                    .then(function(response) {
                        $http.get("clientes/listar")
                            .then(function(response) {
                                setTimeout(function() {
                                    $scope.$apply(function() {
                                        $scope.clientes = response.data;
                                    });
                                }, 0);
                            });
                    });
            }
        });
    </script>
</body>
</html>