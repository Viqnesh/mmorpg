class Example extends Phaser.Scene
{
    lastFired = 0;
    cursors;
    stats;
    speed;
    ship;
    bullets;

    preload ()
    {
        this.load.spritesheet('ship', 'assets/sprites/chevalier.png', { frameWidth: 48, frameHeight: 48 });
        this.load.image('bullet', 'images/bullet.png');
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

            fire (x, y)
            {
                //  Bullets fire from the middle of the screen to the given x/y
                this.setPosition(x, y);
                const angle = Phaser.Math.Angle.Between(x, y, 400, 300);
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

        this.physics.start();
        this.ship = this.physics.add.sprite(400, 300, 'ship').setOrigin(0, 0);
        this.physics.add.existing(this.ship);
        this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('ship', { start: 3, end: 5 }),
            frameRate: 6,
            repeat: -1
        });
        this.anims.create({
            key: 'right',
            frames: this.anims.generateFrameNumbers('ship', { start: 6, end: 8 }),
            frameRate: 6,
            repeat: -1
        });
        this.anims.create({
            key: 'up',
            frames: this.anims.generateFrameNumbers('ship', { start:9, end: 11 }),
            frameRate: 6,
            repeat: -1
        });
        this.anims.create({
            key: 'down',
            frames: this.anims.generateFrameNumbers('ship', { start: 0, end: 2 }),
            frameRate: 6,
            repeat: -1
        });

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

        this.cursors = this.input.keyboard.createCursorKeys();

        this.speed = Phaser.Math.GetSpeed(300, 1);
    }

    update (time, delta)
    {
        if (this.isDown && time > this.lastFired)
        {
            const bullet = this.bullets.get();

            if (bullet)
            {
                bullet.fire(this.mouseX, this.mouseY);
                this.lastFired = time + 50;
            }
        }
        if (this.cursors.left.isDown)
        {
            this.ship.setVelocityX(-160);
            this.ship.anims.play('left', true);
        }
        else if (this.cursors.right.isDown)
        {
            this.ship.setVelocityX(160);
            this.ship.anims.play('right', true);

        }
        else
        {
            this.ship.setVelocityX(0);
            this.ship.anims.stop('right');
        }
    
        // Mouvement vertical
        if (this.cursors.up.isDown)
        {
            this.ship.setVelocityY(-160);
            this.ship.anims.play('up', true);
        }
        else if (this.cursors.down.isDown)
        {
            this.ship.setVelocityY(160);
            this.ship.anims.play('down', true);
        }
        else
        {
            this.ship.setVelocityY(0);
        }
        if (!this.cursors.left.isDown && !this.cursors.right.isDown) {
            this.ship.setVelocityX(0);
        }
    
        if (!this.cursors.up.isDown && !this.cursors.down.isDown) {
            this.ship.setVelocityY(0);
        }

        this.ship.setRotation(Phaser.Math.Angle.Between(this.mouseX, this.mouseY, this.ship.x, this.ship.y) - Math.PI / 2);
    }
}

const config = {
    type: Phaser.WEBGL,
    width: 800,
    height: 600,
    backgroundColor: '#2d2d2d',
    parent: 'phaser-example',
    scene: Example,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 , x:0 },
            debug: false
        }
    },
};

const game = new Phaser.Game(config);
