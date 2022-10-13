  <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Mixing
          </h2>
      </x-slot>
      <div class="mt-5">
          <a href="{{ route('dashboard.product.create') }}"
              class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 focus:outline-none w-full py-3 rounded-full text-lg focus:text-black transition-all duration-200 px-6">
              + Tambah Pakan
          </a>
      </div>
      <!-- START: COMPLETE YOUR ROOM -->
      <section class="md:py-16">

          <div class="container mx-auto px-4">
              <div class="flex -mx-4 flex-wrap">
                  <div class="w-full px-4 mb-4 md:w-8/12 md:mb-0" id="shopping-cart">
                      <div class="flex flex-start mb-4 mt-8 pb-3 border-b border-gray-200 md:border-b-0">
                          <h3 class="text-2xl">Mixing Details</h3>
                      </div>

                      <div class="border-b border-gray-200 mb-4 hidden md:block">
                          <div class="flex flex-start items-center pb-2 -mx-4">
                              <div class="px-4 flex-none">
                                  <div class="" style="width: 90px">
                                      <h6>Foto</h6>
                                  </div>
                              </div>
                              <div class="px-4 w-5/12">
                                  <div class="">
                                      <h6>Pakan</h6>
                                  </div>
                              </div>
                              <div class="px-4 w-5/12">
                                  <div class="">
                                      <h6>Harga</h6>
                                  </div>
                              </div>
                              <div class="px-4 w-2/12">
                                  <div class="text-center">
                                      <h6>Mixing (Kg)</h6>
                                  </div>
                              </div>
                          </div>
                      </div>






                  </div>
                  <div class="w-full md:px-4 md:w-4/12" id="shipping-detail">
                      <div class="bg-gray-100 px-4 py-6 md:p-8 md:rounded-3xl">
                          <form action="{{ route('checkout') }}" method="POST">
                              @csrf

                              <div class="flex flex-start mb-6">
                                  <h3 class="text-2xl">Detail Nutrisi</h3>
                              </div>

                              <div class="flex flex-col mb-4">
                                  <label for="complete-name" class="text-sm mb-2">Protein</label>
                                  <input data-input name="name" type="text" id="complete-name"
                                      class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                      placeholder="Input your name" />
                              </div>

                              <div class="flex flex-col mb-4">
                                  <label for="email" class="text-sm mb-2">Lemak</label>
                                  <input name="email" data-input type="email" id="email"
                                      class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                      placeholder="Input your email address" />
                              </div>

                              <div class="flex flex-col mb-4">
                                  <label for="address" class="text-sm mb-2">Serat</label>
                                  <input name="address" data-input type="text" id="address"
                                      class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                      placeholder="Input your address" />
                              </div>

                              <div class="flex flex-col mb-4">
                                  <label for="phone-number" class="text-sm mb-2">Energi</label>
                                  <input name="phone" data-input type="tel" id="phone-number"
                                      class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                      placeholder="Input your phone number" />
                              </div>
                              <div class="flex flex-col mb-4">
                                  <label for="phone-number" class="text-sm mb-2">Ca</label>
                                  <input name="phone" data-input type="tel" id="phone-number"
                                      class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                      placeholder="Input your phone number" />
                              </div>
                              <div class="flex flex-col mb-4">
                                  <label for="phone-number" class="text-sm mb-2">P</label>
                                  <input name="phone" data-input type="tel" id="phone-number"
                                      class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                      placeholder="Input your phone number" />
                              </div>

                              <div class="text-center">
                                  <button type="submit"
                                      class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 focus:outline-none w-full py-3 rounded-full text-lg focus:text-black transition-all duration-200 px-6">
                                      Hitung Harga Ransum
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

          <!-- END: COMPLETE YOUR ROOM -->
  </x-app-layout>
