<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Index</h3>
                <a class="btn btn-primary" href="{{ route('transaction.show') }}">Detail Transaction</a>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Balance</th>
                      <th>Total Income</th>
                      <th>Total Expense</th>
                      <th>Jumlah Transaksi Income</th>
                      <th>Jumlah Transaksi Expense</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($transactions as $transaction)
                      <tr>
                        <td>{{ $transaction->jml_all }}</td>
                        <td>{{ $transaction->totalIncome }}</td>
                        <td>{{ $transaction->totalExpense }}</td>
                        <td>{{ $transaction->countIncome }}</td>
                        <td>{{ $transaction->countExpense }}</td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="6">
                            No record found!
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>