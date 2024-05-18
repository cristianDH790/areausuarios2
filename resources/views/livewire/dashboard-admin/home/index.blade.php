<div>
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Clients
                        </h3>
                        <h1>
                            {{ $customers->count() }}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Sales
                        </h3>
                        <h1>
                            S/. {{ $sales->sum('total') }}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Certificates
                        </h3>
                        <h1>
                            {{ $certificates->count() }}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>




</div>
