<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('transaction.store') }}">
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3>New Transaction</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          There are some problems with your input.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div> 
                    @endif

                    {{-- alert --}}
                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-control" name="type" placeholder="Type" required>
                            <option value="">-- Pilih type --</option>
                            <option value="income">income</option>
                            <option value="expense">expense</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="income form-control" name="category" placeholder="Type" required>
                            <option value="">-- Pilih category --</option>
                            <option value="wage">wage</option>
                            <option value="bonus">bonus</option>
                            <option value="gift">gift</option>
                        </select>

                        <select class="expense form-control" name="category" placeholder="Type" disabled style="display: none" required>
                            <option value="">-- Pilih category --</option>
                            <option value="food & drinks">food & drinks</option>
                            <option value="shopping">shopping</option>
                            <option value="charity">charity</option>
                            <option value="housing">housing</option>
                            <option value="insurance">insurance</option>
                            <option value="taxes">taxes</option>
                            <option value="transportation">transportation</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" value="" placeholder="Masukan jumlah amount" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="4" cols="50" required></textarea>
                    </div>
                    
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
    $('select[name="type').on('change', function (e) {
        var valueSelected = this.value;
        if(valueSelected == 'income'){
            $(".expense").attr("disabled", true).css('display', 'none');            
            $(".income").attr("disabled", false).css('display', 'block');
        }else{
            $(".income").attr("disabled", true).css('display', 'none');            
            $(".expense").attr("disabled", false).css('display', 'block');
        }
    });
</script>