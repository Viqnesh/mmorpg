class Game extends Phaser.Scene
{
    cursors;
    player;
    graphics;
    closeButton;
    message;
    constructor ()
    {
        super();
    }
    controls;

    preload ()
    {
        this.load.image('outsideA1', "assets/sprites/Outside_A1.png");
        this.load.image('outsideA2', "assets/sprites/Outside_A2.png");
        this.load.image('outsideC', "assets/sprites/Outside_C.png");
        this.load.image('outsideB', "assets/sprites/Outside_B.png");
        this.load.image('spriteGris', "assets/sprites/spriteGris.png");

        this.load.spritesheet('player', 'assets/sprites/chevalier.png', { frameWidth: 48, frameHeight: 48 });
        this.load.spritesheet('larve', 'images/sprites/larve.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('ver', 'images/sprites/ver.png', { frameWidth: 32, frameHeight: 32 });
        this.load.image('bullet', "images/bullet.png" , 10 ,10);

        this.load.tilemapTiledJSON('map', "assets/maps/map.json");
        this.load.tilemapTiledJSON('map2', "assets/maps/map2.json");
        this.load.tilemapTiledJSON('map3', "assets/maps/map3.json");
        this.load.tilemapTiledJSON('map4', "assets/maps/map5.json");
        this.load.image('gem', 'images/personnage/face.png');


    }

    create ()
    {
        class Bullet extends Phaser.GameObjects.Image
                {
                    constructor (scene)
                    {
                        super(scene, 0, 0, 'bullet');
                        this.speed = Phaser.Math.GetSpeed(400, 1);
                    }

                    fire (x, y)
                    {
                        this.setPosition(x, y);
                        this.setActive(true);
                        this.setVisible(true);
                    }

                    updateFire (time, delta)
                    {
                        this.x -= this.speed * delta;

                        if (this.x < -50)
                        {
                            this.setActive(false);
                            this.setVisible(false);
                        }
                    }
                }
                this.bullets = this.add.group({
                    classType: Bullet,
                    maxSize: 10,
                    runChildUpdate: true
                });
                var map = this.make.tilemap({ key: 'map4' });
                var tileset5 = map.addTilesetImage('spriteGris', 'spriteGris');
                var layer1 = map.createLayer(0,tileset5 , 0, 0);
                var layer2 = map.createLayer(1,tileset5 , 0, 0);
                var collisionLayer = layer2.setCollisionByProperty({ solid: "true" });
                this.physics.start();



                var gem = this.add.image(490, 280, 'gem');
                gem.setScrollFactor(0);
                //  Store some data about this Gem:
                gem.setDataEnabled();
                gem.data.set('name', 'Red Gem Stone');
                gem.data.set('level', 2);
                gem.data.set('gold', 150);
                gem.data.set('owner', 'Link');
                gem.data.set('melee', 'Epee');
                gem.data.set('distance', 'Arc');

                gem.setDataEnabled();

                //  Display it
                const text = this.add.text(550, 245, '', { font: '16px Pixel', fill: '#ffffff' });
                text.setText([
                    'NOM : ' + gem.data.get('name'),
                    'NIVEAU : ' + gem.data.get('level'),
                    'HP : ' + gem.data.get('gold') + ' gold',
                    'PM : ' + gem.data.get('owner')
                ]);
                text.setScrollFactor(0);

                this.cameras.main.zoom = 1.8; // Augmentez la valeur pour un zoom plus important
                this.cameras.main.centerOn(480, 280);
                
                this.player = this.physics.add.sprite(210, 250, 'chevalier').setOrigin(0, 0);
                this.player.setCollideWorldBounds(true);
                this.physics.add.collider(this.player, collisionLayer);

                const larve = this.physics.add.sprite(200, 200, 'larve');
                var ver = this.add.sprite(250, 250, 'ver');

                this.physics.add.existing(this.player);
                this.cameras.main.startFollow(this.player); // Fai
                this.anims.create({
                    key: 'moover',
                    frames: this.anims.generateFrameNumbers('ver', { start: 0, end: 2 }),
                    frameRate: 6,
                    repeat: -1
                });
                ver.anims.play('moover', true);
                ver.x += 10;
                this.anims.create({
                    key: 'moovlarve',
                    frames: this.anims.generateFrameNumbers('larve', { start: 0, end: 2 }),
                    frameRate: 6,
                    repeat: -1
                });
                larve.anims.play('moovlarve', true);

                this.anims.create({
                    key: 'left',
                    frames: this.anims.generateFrameNumbers('player', { start: 3, end: 5 }),
                    frameRate: 6,
                    repeat: -1
                });
                this.anims.create({
                    key: 'right',
                    frames: this.anims.generateFrameNumbers('player', { start: 6, end: 8 }),
                    frameRate: 6,
                    repeat: -1
                });
                this.anims.create({
                    key: 'up',
                    frames: this.anims.generateFrameNumbers('player', { start:9, end: 11 }),
                    frameRate: 6,
                    repeat: -1
                });
                this.anims.create({
                    key: 'down',
                    frames: this.anims.generateFrameNumbers('player', { start: 0, end: 2 }),
                    frameRate: 6,
                    repeat: -1
                });

                this.cursors = this.input.keyboard.createCursorKeys();
                this.input.keyboard.on('keydown-SPACE', this.actionEspace, this);


            }
    actionEspace() {
        // Code à exécuter lorsque la touche ESPACE est enfoncée
        console.log('La touche ESPACE a été enfoncée !');
        const bullet = this.bullets.get();

        if (bullet)
        {
            bullet.setScale(0.5)
            bullet.fire(this.player.x, this.player.y);
        }
        // Ajoutez ici votre action souhaitée
    }
    update (time, delta) 
    {

        if (this.cursors.left.isDown)
        {
            this.player.setVelocityX(-160);
            this.player.anims.play('left', true);
        }
        else if (this.cursors.right.isDown)
        {
            this.player.setVelocityX(160);
            this.player.anims.play('right', true);

        }
        else
        {
            this.player.setVelocityX(0);
            this.player.anims.stop('right');
        }
    
        // Mouvement vertical
        if (this.cursors.up.isDown)
        {
            this.player.setVelocityY(-160);
            this.player.anims.play('up', true);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.setVelocityY(160);
            this.player.anims.play('down', true);
        }
        else
        {
            this.player.setVelocityY(0);
        }
        if (!this.cursors.left.isDown && !this.cursors.right.isDown) {
            this.player.setVelocityX(0);
        }
    
        if (!this.cursors.up.isDown && !this.cursors.down.isDown) {
            this.player.setVelocityY(0);
        }
    }

}

const config = {
    type: Phaser.AUTO,
    parent: 'phaser-example',
    width: window.innerWidth,
    height: window.innerHeight,
    position: 'fixed',
    scene: [Game], // Ajout de la scène "Battle" au gestionnaire de scènes
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 , x:0 },
            debug: false
        }
    },

};

const game = new Phaser.Game(config);