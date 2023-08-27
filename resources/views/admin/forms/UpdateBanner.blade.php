@extends('layouts.admin')
@section('css', 'admin/InsertBanner')
@section('js', 'admin/InsertBanner')
@section('title')@parent Inserir Banner @stop


@section('content')

    {{-- Exibição de erros --}}
    @if ($errors->any())
        <div class="container-error">
            <i class="fa-sharp fa-solid fa-circle-exclamation" style="color: #FFFF;"></i>
            @foreach ($errors->all() as $error)
                <p id="txt-error">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif

    <main class="content-banner">

        @if (!empty($getBanner))
            @foreach ($getBanner as $item)
                <form action="{{ route('update-banner', $item['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <h2 class="title">Atualizar Banner</h2>

                    <label class="label-field">Nome</label>
                    <input type="text" name="nome_banner" value="{{ $item['nome_banner'] }}" data-js="text" required
                        class="input-field" placeholder="Titulo">

                    <label class="label-field">URL</label>
                    <input type="text" name="link_route" data-js="text" value="{{ $item['link_route'] }}" required
                        class="input-field" placeholder="Link">

                    <label class="label-field">Status</label>
                    <select class="select-field" name="status">
                        @if ($item['status'] == 1)
                            <option selected value="1">1 - Ativo</option>
                            <option value="0">0 - Inativo</option>
                        @endif

                        @if ($item['status'] == 0)
                            <option value="1">1 - Ativo</option>
                            <option selected value="0">0 - Inativo</option>
                        @endif
                    </select>

                    <label class="label-field">Banner</label>
                    <input type="file" name="link_carrossel" accept="image/*" data-js="image" required
                        class="input-field" placeholder="Banner">

                    <label class="label-field">Banner Resolução Média</label>
                    <input type="file" name="link_carrosselMedium" accept="image/*" data-js="image" required
                        class="input-field" placeholder="Banner Médio">

                    <label class="label-field">Banner Resolução Pequena</label>
                    <input type="file" name="link_carrosselTiny" accept="image/*" data-js="image" required
                        class="input-field" placeholder="Banner Pequeno">

                    <div class="box-buttons">
                        <button type="submit" class="btn-submit">Cadastrar</button>
                        <button type="button" onclick="window.location.href=`{{ route('page-listCarrossel') }}`"
                            class="btn-cancel">Cancelar</button>
                    </div>
                </form>
            @endforeach
        @endif
    </main>

@endsection
