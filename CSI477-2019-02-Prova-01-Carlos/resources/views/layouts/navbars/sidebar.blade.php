<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Easy TCC') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'alunos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('adminAlunos') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Relatório Aluno') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'professores' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('adminProfessores') }} ">
          <i class="material-icons">library_books</i>
            <p>{{ __('Relaório Professor') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'projeto' ? ' active' : '' }}">
        <a class="nav-link" href="">
          <i class="material-icons">unarchive</i>
            <p>{{ __('Criar Projeto') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>