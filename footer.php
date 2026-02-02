    <footer class="footer">
        <div class="container d-flex content-min">
            <div class="col_footer d-flex">
                <div class="logo_footer">
                    <?php my_footer_logo(); ?>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, velit! Ullam modi velit rem consectetur ab, commodi</p>
            </div>
            <div class="col_footer">
                <h3>Menu</h3>

                <ul>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Contato</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Todas as Vagas</a></li>
                    <li><a href="">Políticas de Privacidade</a></li>
                    <li><a href="">Termos de Uso</a></li>
                </ul>
            </div>
            <div class="col_footer">
                <h3>Categorias</h3>

                <ul>
                    <li><a href="">Administração</a></li>
                    <li><a href="">Contabilidade</a></li>
                    <li><a href="">Serviços Gerais</a></li>
                    <li><a href="">Comercial</a></li>
                    <li><a href="">Marketing</a></li>
                    <li><a href="">Metalurgica</a></li>
                </ul>
            </div>
            <div class="col_footer">
                <h3>Redes Sociais</h3>
            </div>
        </div>
        <div class="bottom_footer">
            <div class="container d-flex justify-center p-10">
                <p>© <?= date('Y') ?> - Todos os direitos reservados</p>
            </div>
        </div>
    </footer>

    <?php wp_footer() ?>
</body>
</html>