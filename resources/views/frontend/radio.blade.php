 
<style>
    .logo {
        display: block !important;
    }
</style>
<div class="container shadow-sm bg-white p-3">
    
                        @foreach ($radios->slice(1,10) as $radio)

                  <div class="row mb-2 rela pe-3">
                      <div class="col-3 pr-md-0">
                    

                      <h6 class="mb-0 text-dark">
                           {{$radio->name}}
                       </h6>
                      </a> 
                      </div>
                  </div>
                        @endforeach
</div> 
 