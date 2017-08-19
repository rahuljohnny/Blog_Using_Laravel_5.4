<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

<p>It's the child no 1</p>

@yield('content')
<p>It's the child no 2</p>

@yield('sidebar')

<p>It's the child no 3</p>
@yield('nav')
