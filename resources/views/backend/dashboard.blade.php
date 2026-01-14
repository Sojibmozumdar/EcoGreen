 @extends('backend.mastaring')


@section('content')


 <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon-shape bg-light-green"><i class="bi bi-currency-dollar"></i></div>
                <h6>Net Revenue</h6>
                <h2>$24,580</h2>
                <span class="trend-up"><i class="bi bi-arrow-up"></i> 12.5%</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon-shape bg-light-blue"><i class="bi bi-truck"></i></div>
                <h6>Active Orders</h6>
                <h2>154</h2>
                <span class="text-muted small">8 pending today</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon-shape bg-light-green"><i class="bi bi-tree"></i></div>
                <h6>CO2 Saved</h6>
                <h2>840kg</h2>
                <span class="trend-up"><i class="bi bi-arrow-up"></i> 5.2%</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon-shape bg-light-blue"><i class="bi bi-star"></i></div>
                <h6>Satisfaction</h6>
                <h2>4.9/5</h2>
                <span class="text-muted small">98 new reviews</span>
            </div>
        </div>
    </div>

    <div class="table-box">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Recent Activity</h5>
            <button class="btn btn-sm btn-outline-success px-3 rounded-pill">View All</button>
        </div>
        <table class="table align-middle border-0">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle p-2 text-center" style="width: 35px; height: 35px; font-size: 0.8rem;">JD</div>
                            <span class="fw-600">John Doe</span>
                        </div>
                    </td>
                    <td>Eco Water Bottle</td>
                    <td class="text-muted small">Oct 24, 2026</td>
                    <td class="fw-bold">$45.00</td>
                    <td><span class="badge-soft-success">Shipped</span></td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle p-2 text-center" style="width: 35px; height: 35px; font-size: 0.8rem;">SK</div>
                            <span class="fw-600">Sarah Khan</span>
                        </div>
                    </td>
                    <td>Hemp Tote Bag</td>
                    <td class="text-muted small">Oct 23, 2026</td>
                    <td class="fw-bold">$22.50</td>
                    <td><span class="badge-soft-warning">Processing</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
  @endsection
