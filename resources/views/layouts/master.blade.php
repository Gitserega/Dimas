<!DOCTYPE html>
<html lang="ru">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://api-maps.yandex.ru/2.1/?apikey=4afd13cb-03a5-45cc-b6b0-263a0312c4e4&lang=ru_RU"></script>

<head>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('main.index') }}">Главная</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Запись
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('records.create') }}">Записаться</a></li>
              <li><a class="dropdown-item" href="{{ route('records.index') }}">Найти запись</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('service.index') }}">Услуги</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.index') }}">Контакты</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Груминг животных "Elite Paws"')</title>
  @yield('head')
</head>
<style>
  .navbar {
      background-color: #ffffff !important; 
      padding: 15px 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
    }
    .navbar-nav {
      margin: 0 auto;
      display: flex;
      justify-content: center;
    }
    .nav-link {
      color: #000000 !important; 
      font-weight: 500;
      font-size: 18px;
      padding: 10px 20px !important;
      text-transform: uppercase;
    }
    .nav-link:hover {
      color:rgb(206, 113, 20) !important;
      text-decoration: none;
    }
    .dropdown-menu {
      background-color: #ffffff;
      border: 1px solid #e9ecef;
    }
    .dropdown-item {
      color: #000000 !important;
    }
    .dropdown-item:hover {
      background-color: #f8f9fa;
      color: rgb(206, 113, 20) !important;
    }
    .navbar-toggler {
      border-color: #000000;
    }
</style>
<style>
  /* Основные стили */
  body {
      font-family: 'Montserrat', sans-serif;
      color: var(--text);
      line-height: 1.6;
      margin: 0;
      padding: 0;
      padding-top: 90px; /* Отступ для фиксированного хедера */
  }

  /* Стили для фиксированного хедера */
  .site-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      /* background: rgba(255, 255, 255, 0.95); */
      backdrop-filter: blur(8px);
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      padding: 15px 0;
  }

  /* Контейнер для содержимого хедера */
  .header-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
  }

  /* Логотип */
  .logo {
      font-size: 24px;
      font-weight: bold;
      color: #e88409;
      text-decoration: none;
      margin-right: 20px;
  }

  /* Горизонтальное меню */
  .main-nav {
      display: flex;
      gap: 30px; /* Уменьшил расстояние между пунктами */
  }

  .nav-link {
      text-decoration: none;
      color: #0a0a0a;
      font-size: 18px;
      font-weight: 600;
      transition: color 0.3s;
      padding: 5px 10px;
      border-radius: 4px;
  }

  .nav-link:hover {
      /* color: #e88409; */
      background: rgba(232, 132, 9, 0.1);
  }

  /* Основной контент */
  .main-content {
      /* max-width: 1200px; */
      margin: 0 auto;
      padding: 20px;
      width: 100%;
  }

  /* Адаптация для мобильных устройств
  @media (max-width: 768px) {
      body {
          padding-top: 70px;
      }
      
      .header-container {
          flex-direction: column;
          padding: 10px;
      }
      
      .main-nav {
          gap: 15px;
          margin-top: 10px;
          flex-wrap: wrap;
          justify-content: center;
      }
      
      .nav-link {
          font-size: 16px;
          padding: 5px 8px;
      } */
  
</style>
<body>



  <main>
    @yield('content')
  </main>

  <footer>
    <p>&copy; 2025 Груминг животных "Elite Paws". Все права защищены.</p>
    @yield('footer')
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
