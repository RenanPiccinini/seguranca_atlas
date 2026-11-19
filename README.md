# Atlas Segurança e Zeladoria 🛡️

Sistema web institucional e operacional completo desenvolvido para a **Atlas Segurança e Zeladoria LTDA**, sediada em **Arcos - MG**.

Construído com **Laravel 11+**, **MySQL**, **Tailwind CSS**, efeitos 3D interativos, efeitos Parallax e integração direta com WhatsApp.

---

## 📸 Identidade Visual e Operação
O projeto inclui as fotos e imagens oficiais de alta definição da empresa:
- **Logo Oficial 3D Atlas** (`public/images/atlas/logo.jpg` e `emblem.png`)
- **Central CFTV & Sala de Monitoramento 24h** (`public/images/atlas/cftv-monitoramento.jpg`)
- **Vigilância Perimetral em Usinas Fotovoltaicas** (`public/images/atlas/usinas-vigia.jpg`)
- **Brigadistas Credenciados em Prevenção de Sinistros** (`public/images/atlas/brigadista.jpg`)
- **Equipe de Apoio para Eventos & Controle de Fluxo** (`public/images/atlas/equipe-de-apoio.jpg`)
- **Controle de Acesso Biométrico & Portaria** (`public/images/atlas/controle-acesso-portaria.jpg`)
- **Segurança Hospitalar & Corporativa** (`public/images/atlas/seguranca-hospitalar-corporativa.jpg`)

---

## 🎛️ Painel Administrativo & Gerenciador Completo (Sidebar na Esquerda)

O sistema conta com uma área administrativa completa com **menus na lateral esquerda** acessível em `/painel`:

1. 📊 **Visão Geral (`/painel`):**
   - Métricas em tempo real (Total de cotações, pendentes, mensagens de contato, serviços ativos e fotos).
   - Atalhos operacionais com um clique.

2. 📋 **Cotações & Leads (`/painel/orcamentos`):**
   - Visualização de todas as solicitações registradas no simulador de custos.
   - **Botão Oficial para Abrir WhatsApp Direto** do cliente com mensagem pré-formatada.
   - Ações de status dinâmicas: *Pendente*, *Lida / Em Análise*, *Concluída*.
   - Filtros por status, busca por nome/empresa/telefone e exclusão.

3. 💬 **Mensagens de Contato (`/painel/mensagens`):**
   - Acompanhamento de mensagens do formulário "Fale Conosco".
   - Abertura de conversa no WhatsApp do remetente e marcação como lida/respondida.

4. 🛡️ **Gerenciar Serviços (`/painel/servicos`):**
   - **CRUD Completo:** Adicionar novos serviços, editar títulos, badges, descrições, itens e benefícios, fazer upload de novas fotos, reordenar ou excluir.

5. 📸 **Galeria de Fotos (`/painel/galeria`):**
   - Controle total das fotos exibidas na galeria do site.
   - Upload de imagens com categorização (CFTV, Usinas Solares, Portaria, Eventos, Hospitalar) e exclusão.

6. ⭐ **Diferenciais Operacionais (`/painel/diferenciais`):**
   - Gerenciar os pilares e métricas de destaque do site (ex: 24/7, 100%, < 8min).

7. ⚙️ **Configurações & Textos do Site (`/painel/configuracoes`):**
   - Altere telefones, WhatsApp, e-mail comercial, sede em Arcos - MG, textos do Hero e sobre nós em tempo real.

---

## 🚀 Principais Recursos do Site

1. **Efeitos 3D & Parallax:**
   - Canvas com rede de partículas e radar tático 3D interativo no Hero.
   - Cards com perspectiva 3D (*tilt cards*) que reagem à inclinação do mouse.
   - Efeitos Parallax em camadas de profundidade.

2. **Botão Flutuante do WhatsApp:**
   - Ícone vetorial oficial do WhatsApp (`#25D366`) com efeito pulsante (*radar wave*), tooltip de atendimento e link direto para o plantão: **(37) 99967-3426**.

3. **Simulador de Orçamento Interativo (Salvo no MySQL):**
   - Estimador em tempo real de investimento por posto.
   - Envio assíncrono (AJAX) que registra o lead no banco de dados MySQL e oferece direcionamento imediato para o WhatsApp com a proposta formatada.

4. **Compatibilidade com Apache / Hospedagem Compartilhada:**
   - Contém o arquivo `.htaccess` na raiz direcionando para a pasta `public/`, permitindo publicação direta em servidores cPanel / Apache.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** PHP 8.3+, Laravel 11/12 (Eloquent ORM, Blade, Migrations, Seeders)
- **Banco de Dados:** MySQL
- **Frontend:** Tailwind CSS v4, JavaScript Moderno, Canvas 3D
- **Testes Automatizados:** 100% dos testes aprovados via PHPUnit (10 testes, 26 asserções)

---

## ⚙️ Instalação e Execução Local

### 1. Clonar o repositório
```bash
git clone https://github.com/RenanPiccinini/seguranca_atlas.git
cd seguranca_atlas
```

### 2. Instalar dependências
```bash
composer install
npm install
npm run build
```

### 3. Configurar o `.env`
Configure os parâmetros do MySQL no arquivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=atlas_seguranca
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Executar as Migrações e Alimentar os Dados (Seeders)
```bash
php artisan migrate --seed
```

### 5. Iniciar o Servidor
```bash
php artisan serve
```
- **Site:** `http://127.0.0.1:8000`
- **Painel:** `http://127.0.0.1:8000/painel`
- **Cotações:** `http://127.0.0.1:8000/painel/orcamentos`
- **Serviços:** `http://127.0.0.1:8000/painel/servicos`
- **Galeria:** `http://127.0.0.1:8000/painel/galeria`
- **Textos:** `http://127.0.0.1:8000/painel/configuracoes`

---

## 📍 Localização e Contato
- **Empresa:** Atlas Segurança e Zeladoria LTDA
- **Cidade:** Arcos - MG
- **Telefone / WhatsApp:** (37) 99967-3426
