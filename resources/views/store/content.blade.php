  @extends('layouts.header')
  @section('content')
  <div class="gap-1 px-6 flex flex-1 py-5 items-center justify-center mt-">
      <div class="layout-content-container flex flex-col w-full md:w-[40%] ">
          <h1 class="text-3xl">All Clothing</h1>

          <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Size</h2>
          <div class="p-3">
              <form action="/store/content" method="get" class="flex flex-col space-y-3   ">
                  <select name="size" class="select flex h-8 px-4 text-[#111518] text-sm font-medium leading-normal rounded-xl bg-[#f0f2f5] w-32  ">
                      <option value="">ALL</option>
                      <option value="XS" {{ request('size') == 'XS' ? 'selected' : '' }}>XS</option>
                      <option value="S" {{ request('size') == 'S' ? 'selected' : '' }}>S</option>
                      <option value="M" {{ request('size') == 'M' ? 'selected' : '' }}>M</option>
                      <option value="L" {{ request('size') == 'L' ? 'selected' : '' }}>L</option>
                      <option value="XL" {{ request('size') == 'XL' ? 'selected' : '' }}>XL</option>
                      <option value="XXL" {{ request('size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                      <option value="XXXL" {{ request('size') == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                  </select>
                
                  <select name="sort_price" class="select1 flex h-8 px-4 text-[#111518] text-sm font-medium leading-normal rounded-xl bg-[#f0f2f5] w-fit ">
                      <option value=""> Price</option>
                      <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Low to High</option>
                      <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>High to Low</option>
                  </select>
                  <button type="submit" class="a hidden">
                      Filter
                  </button>
          </div>
          <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Color</h2>

          <div class="flex gap-3 p-3 flex-wrap pr-4">
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">Red</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">Blue</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">White</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">Black</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">Green</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">Yellow</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f5] pl-4 pr-4">
                <p class="text-[#111518] text-sm font-medium leading-normal">Purple</p>
              </div>
            </div>
        
          </form>

      </div>

      <div class="flex flex-wrap gap-12 items-center mt-14">
        @foreach ($all as $store)
        @if ($store->stock >0)
            
        <div class="flex flex-col w-[12vw]">
            <div>
                <img class="w-[100%] h-[20vh]" src="{{ asset('storage/images/' . $store->image) }}" alt="">
            </div>
            <div class="flex justify-between">
                <div>
                    <h1>{{ $store->title }}</h1>
                    <h1>${{ $store->price }}</h1>
                </div>
                <form action="/cards/store" method="POST">
                    @csrf
                    <input type="hidden" name="store_id" value="{{ $store->id }}">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M222.14,58.87A8,8,0,0,0,216,56H54.68L49.79,29.14A16,16,0,0,0,34.05,16H16a8,8,0,0,0,0,16h18L59.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,152,204a28,28,0,1,0,28-28H83.17a8,8,0,0,1-7.87-6.57L72.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,222.14,58.87ZM96,204a12,12,0,1,1-12-12A12,12,0,0,1,96,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,192,204Zm4-74.57A8,8,0,0,1,188.1,136H69.22L57.59,72H206.41Z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        
        @endif
    @endforeach
    
      </div>
  </div>
  @endsection
