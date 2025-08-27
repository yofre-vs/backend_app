@extends('ws::Layouts.basic.main_account')
@section('title', 'Dashboard - Bienvenido')
@section('content')

<div class="text-center">
    <img src="{{ asset('assets/shared/images/user.jpg') }}" class="img-circle-container">
           
    <h1 class="tittle-h1">Frank Valle Sanchez</h1>
    <p>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
           3 Subscripciones Activas
        </span>
        <span  class="border-right border-left pl-2 pr-2 ml-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            
             Acceso a 5 Modulos
        </span> 
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            Último ingreso, 13 mayo 2025
        </span>  
    </p>
    <p>Revisa tus suscripciones activas y elige el módulo con el que quieres trabajar hoy.<br/>
Cada herramienta está diseñada para ayudarte a organizar mejor tus tareas y enfocarte en lo que realmente importa.</p>
</div>
<div>
    @foreach($workspaces as $ws )
@php 
  // dd($ws->workspace)
    @endphp
    
    <div class="row  border rounded-lg">
        <div class="col-5">
            <!-- <h3 class="tittle-h3 mt-3"><strong>Subscripcion #1025448-FF42</strong></h3>
            <div>Empresa de transorte Civa - Ruc 2013154565</div>
            <div>Establecimiento Los fresnos 1245</div>-->
        </div>
        <div class="col-7 text-center" >
            <a href="{{ asset('w') }}/{{$ws->workspace->workspace_uuid}}" class="domain_launcher">
                <i class="lnil lnil-car"></i>
                <H3>{{$ws->workspace->workspace_ws}}d</h3>
                <p class="p-0, m-0 ">{{$ws->workspace->workspace_ws}}</p>
            </a>
        </div>
    </div>
    @endforeach
</div>
     
     

 @endsection