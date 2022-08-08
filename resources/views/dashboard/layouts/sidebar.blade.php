<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is ('dashboard*') ? 'active' : '' }}" href="/dashboard">
            <span class="align-text-bottom"></span><i class="bi bi-clipboard-check"></i>
            My Posts
          </a>
        </li>
      </ul>

      {{-- <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is ('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span class="align-text-bottom"></span><i class="bi bi-clipboard-check"></i>
            Category
          </a>
        </li>
      </ul> --}}

    </div>
  </nav>