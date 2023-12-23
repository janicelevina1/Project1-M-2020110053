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
                <h3>List Transaction</h3>
                <a class="btn btn-primary" href="{{ route('index') }}">Index Transaction</a>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <p>
                  <a class="btn btn-primary" href="{{ route('transaction.create') }}">New Transaction</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Type</th>
                      <th>Category</th>
                      <th>Amount</th>
                      <th>Notes</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($transactions as $transaction)
                      <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->notes }}</td>
                        <td>
                          <a href="{{ route('transaction.edit', ['id' => $transaction->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                          <a href="#" class="btn btn-sm btn-danger" onclick="
                            event.preventDefault();
                            if (confirm('Do you want to remove this?')) {
                              document.getElementById('delete-row-{{ $transaction->id }}').submit();
                            }">
                            delete
                          </a>
                          <form id="delete-row-{{ $transaction->id }}" action="{{ route('transaction.destroy', ['id' => $transaction->id]) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              @csrf
                          </form>
                        </td>
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
                {!! $transactions->withQueryString()->links('pagination::bootstrap-5') !!}

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>