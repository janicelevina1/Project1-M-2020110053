<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        .displaynone{
            display: none;
        }
        .displayblock{
            display: block;
        }
    </style>
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('transaction.update', $transaction->id) }}">
            @method('PUT')
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3>Edit transaction</h3>
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

                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select class="form-control" name="type" placeholder="Type"required >
                                <option value="">-- Pilih type --</option>
                                <option value="income" {{($transaction->type === 'income') ? 'Selected' : ''}} >income</option>
                                <option value="expense" {{($transaction->type === 'expense') ? 'Selected' : ''}} >expense</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select required class="{{($transaction->type === 'expense') ? 'displaynone' : 'displayblock'}} income form-control" name="category" placeholder="category" {{($transaction->type === 'expense') ? 'disabled' : ''}}>
                                <option value="">-- Pilih category --</option>
                                <option value="wage" {{($transaction->category === 'wage') ? 'Selected' : ''}}>wage</option>
                                <option value="bonus" {{($transaction->category === 'bonus') ? 'Selected' : ''}}>bonus</option>
                                <option value="gift" {{($transaction->category === 'gift') ? 'Selected' : ''}}>gift</option>
                            </select>

                            <select required class="{{($transaction->type === 'income') ? 'displaynone' : 'displayblock'}} expense form-control" name="category" placeholder="category" {{($transaction->type === 'income') ? 'disabled' : ''}} >
                                <option value="" >-- Pilih category --</option>
                                <option value="food & drinks" {{($transaction->category === 'food & drinks') ? 'Selected' : ''}}>food & drinks</option>
                                <option value="shopping" {{($transaction->category === 'shopping') ? 'Selected' : ''}}>shopping</option>
                                <option value="charity" {{($transaction->category === 'charity') ? 'Selected' : ''}}>charity</option>
                                <option value="housing" {{($transaction->category === 'housing') ? 'Selected' : ''}}>housing</option>
                                <option value="insurance" {{($transaction->category === 'insurance') ? 'Selected' : ''}}>insurance</option>
                                <option value="taxes" {{($transaction->category === 'taxes') ? 'Selected' : ''}}>taxes</option>
                                <option value="transportation" {{($transaction->category === 'transportation') ? 'Selected' : ''}}>transportation</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input required type="text" class="form-control" name="amount" value="{{$transaction->amount}}" placeholder="Masukan jumlah amount">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea required class="form-control" name="notes" rows="4" cols="50">{{$transaction->notes}}</textarea>
                        </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Update</button>
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