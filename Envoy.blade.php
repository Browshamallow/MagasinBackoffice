@servers(['web' => 'sc2trpa3376@ftp.browshamallow.o2switch.net'])

@setup
    $repository = 'git@github.com:Browshamallow/MagasinBackoffice.git';
    $releases_dir = '/home/sc2trpa3376/releases';
    $app_dir = '/home/sc2trpa3376/www';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir .'/'. $release;
@endsetup

@task('deploy', ['on' => 'web'])
    echo "🔄 Déploiement du code..."

    mkdir -p {{ $new_release_dir }}
    git clone --depth 1 {{ $repository }} {{ $new_release_dir }}

    echo "📦 Installation des dépendances..."
    cd {{ $new_release_dir }}
    composer install --no-dev --prefer-dist --no-interaction

    echo "🔁 Mise à jour du lien vers l'application"
    ln -nfs {{ $new_release_dir }} {{ $app_dir }}

    echo "⚙️  Exécution des commandes Laravel..."
    cd {{ $app_dir }}
    php artisan config:cache
    php artisan migrate --force
    php artisan key:generate

    echo "✅ Déploiement terminé"
@endtask
