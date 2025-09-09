      </main>
      <footer>
        © 2025 e-Arsip - Tugas Kuliah
      </footer>
      </div> <!-- end content -->
      </div> <!-- end flex -->
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          const sidebar = document.getElementById("sidebar");
          const overlay = document.getElementById("overlay");
          const toggleBtn = document.getElementById("sidebarToggle");

          // buka/tutup sidebar
          toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("show");
            overlay.classList.toggle("show");
          });

          // klik overlay untuk menutup
          overlay.addEventListener("click", function() {
            sidebar.classList.remove("show");
            overlay.classList.remove("show");
          });
        });
      </script>

      </body>

      </html>