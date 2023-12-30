<div class="px-8 text-black navbar">
  <div class="flex-1">
    <a class="text-2xl font-bold text-blue-700 btn btn-ghost">PHP DB</a>
  </div>
  <div class="flex-none">
    <ul class="px-1 menu menu-horizontal">
      <li>
        <details> <!--con details podemos crear barras desplegables -->
          <summary class = " text-[1.3rem]">
           usuario
          </summary>
          <ul class="flex flex-col h-32 p-2 text-center text-black bg-white rounded-md shadow-sm gap-y-4 shadow-black">
            <a class = "rounded-md w-36 hover:bg-purple-500 hover:text-white" href="index.php?vista=user_new">Nueva</a>
            <a class = "rounded-md w-36 hover:bg-purple-500 hover:text-white" href="index.php?vista=user_list">Lista</a>
            <a class = "rounded-md w-36 hover:bg-purple-500 hover:text-white" href="index.php?vista=user_search">Buscar</a>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>