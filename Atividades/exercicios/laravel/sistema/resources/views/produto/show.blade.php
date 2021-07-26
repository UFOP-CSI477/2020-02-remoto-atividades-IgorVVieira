@extends('app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-7 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Detalhes do produto
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <ul class="list">
                                        <li>Nome: {{ $produto->nome }}</li>
                                        <li>Unidade: {{ $produto->um }}</li>
                                        <hr>
                                    </ul>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
