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

## 🚀 Principais Funcionalidades

1. **Efeitos 3D & Efeitos Parallax**:
   - Rede de partículas e radar tático 3D interativo via Canvas no Hero.
   - Cards com perspectiva 3D (*tilt cards*) que reagem à posição do cursor do usuário.
   - Parallax suave de múltiplos planos em profundidade.

2. **Botão Flutuante Oficial do WhatsApp**:
   - Ícone oficial do WhatsApp com efeito de pulso (*radar wave*).
   - Tooltip dinâmico de atendimento e link direto para o plantão: **(37) 99967-3426**.

3. **Simulador de Orçamento Interativo (Salvo no MySQL)**:
   - Estimador em tempo real de investimento por posto.
   - Envio assíncrono (AJAX) que registra o lead no banco de dados MySQL e oferece direcionamento imediato para o WhatsApp com a proposta formatada.

4. **Painel Operacional (`/painel`)**:
   - Gerenciamento de propostas e mensagens de contato em tempo real gravadas no MySQL.
   - Atualização dinâmica de status (*pendente, analisado, proposta enviada, fechado*).

5. **Compatibilidade com Apache / Hospedagem Compartilhada**:
   - Contém o arquivo `.htaccess` na raiz direcionando para a pasta `public/`, permitindo publicação direta em servidores cPanel / Apache.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** PHP 8.3+, Laravel 11/12 (Eloquent ORM, Blade, Migrations, Seeders)
- **Banco de Dados:** MySQL
- **Frontend:** Tailwind CSS v4, JavaScript Moderno, Canvas 3D
- **Testes Automatizados:** PHPUnit (100% dos testes aprovados)

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
Acesse no navegador: `http://127.0.0.1:8000`  
Painel Operacional: `http://127.0.0.1:8000/painel`

---

## 📍 Localização e Contato
- **Empresa:** Atlas Segurança e Zeladoria LTDA
- **Cidade:** Arcos - MG
- **Telefone / WhatsApp:** (37) 99967-3426
