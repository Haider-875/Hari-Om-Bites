@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <x-hero />

    <!-- Heritage & Story Section (includes Inside Hari Om gallery) -->
    <x-story :totalDishes="$totalDishes" :vegCount="$vegCount" :gfCount="$gfCount" />

    <!-- Chef's Selection Signature Dishes Carousel -->
    <x-chef-selection />

    <!-- Full Menu Exploration Teaser / Categories Grid -->
    <x-menu-preview :categories="$categories" />

    <!-- Atmosphere & Ambience Experience -->
    <x-experience />

    <!-- Visit Us / Location & Reservation -->
    <x-visit />
@endsection
