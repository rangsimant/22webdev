var app=angular.module("myApp",['ngRoute']);
  
app.config(function($routeProvider, $locationProvider){
  
    $routeProvider.when('/',{
        templateUrl:"index.html",
        controller:"HomeController"
    })
    .when('/dashboard',{
        templateUrl:"dashboard.html",
        controller:"DashboardController"
    })
    .otherwise({
        redirectTo:'/'
    });
  
    $locationProvider.html5Mode(true);
});
  
app.controller('HomeController',function($scope){
  
});
  
app.controller('DashboardController',function($scope){
  
});