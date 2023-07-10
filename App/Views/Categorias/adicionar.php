<h3>Adicionar Categoria</h3>
<form method="POST" action="<?= BASE_URL; ?>Categorias/adicionar">
    <div class="mb-3">
    <label class="form-label" for="nome">Nome:</label>
    <input class="form-control" type="text" id="nome" name="nome" required>
    </div>
    <!-- Outros campos do formulário -->
    <div class="mb-3">
    <button class="btn btn-success" type="submit">Adicionar</button>
    </div>
</form>
