<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Cadastro de Moveis') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-fundo border-b border-gray-200 te">
					<h4> Adicionar Moveis </h4>
				</div>
				<div class="d-flex justify-content-center">
					<form action="{{route('add-movel')}}" method="POST" enctype="multipart/form-data" class="ml-10">
						@csrf
						<div>
							<x-label for="tipo" class="mt-5" :value="__('Tipo:')" />
							<x-input id="tipo" class="block" type="text" name="tipo" :value="old('tipo')" required />
						</div>
						<div>
							<x-label for="descricao" class="mt-5" :value="__('Descrição:')" />
							<x-input id="descricao" class="from-control-file " type="text" name="descricao" :value="old('descricao')" required />
						</div>
						<div>
							<x-label for="image" class="mt-5" :value="__('Foto:')" />
							<x-input id="image" class="from-control-file " type="file" name="image" :value="old('foto')" required />
						</div>
						<x-button class="ml-4 mt-5 mb-5 bg-green-600 hover:green-400">
							{{ __('Adicionar') }}
						</x-button>
					</form>
				</div>
			</div>
			<h3>Móveis</h3>
			<div class="grid grid-cols-3 ">
				@foreach(Auth::user()->movels as $movel)
				<div class="card mt-5" style="width: 18rem;">
					<img src="/img/teste/{{$movel->foto}}" class="card-img-top">
					<div class="card-body text-break">
						<h5 class="card-title">{{ $movel->tipo }}</h5>
						<p class="card-text">{{$movel->descricao}}</p>

						<div class=" item-center justify-center">
							<!--Botão de editar -->
							<div x-data="{modal_editar: false}">
								<!--Ícone -->
								<div  @click="modal_editar = true" class="btn btn-success">
									Editar
								</div>
								<a href="{{ route('rm-movel', $movel)}}" style="text-decoration: none;" class="btn btn-danger">Excluir</a>
								<!-- MODAL de editar -->
								<div class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" x-show="modal_editar">
									<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
										<div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="modal_editar = false">
											<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
										</div>
										<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
										<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-3" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
											<div>
												<form action="{{ route('update-movel', $movel) }}" method="POST">
													@csrf
													@method('PUT')
													<div class="m-3">
														<x-label for="tipo" :value="__('Tipo')" />
														<x-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" value=" {{ $movel->tipo }}" required/>
														</div>
														<div class="m-3">
															<x-label for="descricao" :value="__('Descrição')" />
															<x-input id="descricao" class="block mt-1 w-full" type="Text" name="descricao" value=" {{ $movel->descricao }}" required/>
															</div>

															<div class="flex items-center justify-end mt-4">
																<div class="flex items-center justify-center mt-4">
																	<a class="underline text-sm hover:text-red-500 cursor-pointer" @click="modal_editar = false">
																		{{ __('Cancelar') }}
																	</a>
																	<x-button class="ml-4 bg-green-500 text-green-500 font-semibold border border-green-200 hover:bg-green-800 hover:text-white hover:border-transparent hover:shadow-md">
																		{{ __('Editar') }}
																	</x-button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
<link rel="stylesheet" href="{{ asset('site/style.css') }}">

<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/style.css') }}"></script>