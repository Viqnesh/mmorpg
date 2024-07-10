class World extends Phaser.Scene
{
    lastFired = 0;
    cursors;
    stats;
    speed;
    ship;
    bullets;

    preload ()

    {
        this.load.image('bullet', 'images/bullet.png');
        this.load.spritesheet('player', 'assets/sprites/chevalier.png', { frameWidth: 48, frameHeight: 48 });

    }

    create ()

    {
        class Bullet extends Phaser.GameObjects.Image
        {
            constructor (scene)
            {
                super(scene, 0, 0, 'bullet');
                this.incX = 0;
                this.incY = 0;
                this.speed = Phaser.Math.GetSpeed(400, 1);
            }

            fire (x, y, player)
            {
                //  Bullets fire from the middle of the screen to the given x/y
                this.setPosition(player.x, player.y);
                console.log("Viseur " + x, y);
                console.log("Coordonnées Joueur " + player.x, player.y);
                const angle = Phaser.Math.Angle.Between(x, y, player.x, player.y);
                this.setRotation(angle);
                this.incX = Math.cos(angle);
                this.incY = Math.sin(angle);

            }

            update (time, delta)
            {
                this.x -= this.incX * (this.speed * delta);
                this.y -= this.incY * (this.speed * delta);

            }
        }
        this.bullets = this.add.group({
            classType: Bullet,
            maxSize: 150,
            runChildUpdate: true
        });
        this.input.on('pointerdown', pointer =>
        {
            this.isDown = true;
            this.mouseX = pointer.x;
            this.mouseY = pointer.y;
            const bullet = this.bullets.get();

            if (bullet)
            {
                bullet.fire(this.mouseX, this.mouseY, this.player);
            }
        });

        this.input.on('pointermove', pointer =>
        {
            this.mouseX = pointer.x;
            this.mouseY = pointer.y;
        });

        this.input.on('pointerup', pointer =>
        {
            this.isDown = false;
        });

        this.physics.start();
        this.player = this.physics.add.sprite(400, 500, 'player');
        this.cursors = this.input.keyboard.createCursorKeys();
        this.speed = Phaser.Math.GetSpeed(300, 1);
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
    }
    update ()

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
    type: Phaser.WEBGL,
    width: window.innerWidth,
    height: window.innerHeight,
    position: 'fixed',
    backgroundColor: '#2d2d2d',
    parent: 'phaser-example',
    scene: World,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 , x:0 },
            debug: false
        }
    },
};

const game = new Phaser.Game(config);