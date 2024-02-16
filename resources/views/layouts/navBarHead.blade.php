@extends('layouts.mainHead')

<!DOCTYPE html>
<html>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/home">
                <button type="button" class="btn btn-primary">DreamCar</button>
            </a>
        </div>
        <ul class="nav navbar-nav mr-auto">
            @auth
                @if(auth()->user()->isAdmin())
                    <li><a href="/reservas"><button type="button" class="btn btn-outline-primary">Reserva</button></a></li>
                    <li><a href="/marcas"><button type="button" class="btn btn-outline-primary">Marcas</button></a></li>
                    <li><a href="/vehiculos"><button type="button" class="btn btn-outline-primary">Vehiculo</button></a></li>
                @elseif(auth()->user()->isEmployee())
                    <li><a href="/reservas"><button type="button" class="btn btn-outline-primary">Reserva</button></a></li>
                @endif
            @endauth
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <button type="button" class="btn btn-danger">Log Out</button>
                </a>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
                <!-- Todo esto es para que quede en linea con los otros botones nada mas -->
            </li>
        </ul>
    </div>
</nav>
</html>

