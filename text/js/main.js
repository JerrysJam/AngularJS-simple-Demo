/**
 * Created by Administrator on 2016/8/1.
 */
angular.module('myApp', [])
    .controller('SignUpController', function ($scope) {//$scope->model
        $scope.userdata = {};
        $scope.submitForm = function () {
            console.log($scope.userdata);
            if ($scope.signUpForm.$invalid)
                alert("no");
            else alert("yes");
        }
    })
    .directive('compare', function () {//.directive->view(操作DOM)
        var o = {};
        o.strict = 'AE';
        o.scope = {
            orgText: '=compare'
        };
        o.require = 'ngModel';
        o.link = function (sco, ele, att, con) {
            //o.link = function (sco, ele, con) {//错误
            con.$validators.compare = function (v) {
                return v == sco.orgText;
            }
            sco.$watch('orgText', function () {
                con.$validate();
            });
        }
        return o;
    })
    .directive('helloWorld', function () {
        return {
            restrict: 'AE',
            //template: '<p style="background-color:{{color}}">Hello World',
            template: login.html,
            link: function (sco, ele) {
                ele.bind('click', function () {
                    ele.css('background-color', 'green');
                    sco.$apply(function () {
                        sco.color = "red";
                    });
                });
                ele.bind('mouseover', function () {
                    ele.css('cursor', 'pointer');
                });
            }
        };
    });

