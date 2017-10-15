using System;
using OpenTK;
using OpenTK.Graphics;
using OpenTK.Graphics.OpenGL;
using OpenTK.Input;
using System.Collections.Generic;
using System.Drawing;

namespace evm8
{
    class Game : GameWindow
    {
        Bitmap bmp;
        byte[] bytes;
        Bitmap bmp_go;
        byte[] bytes_go;
        private Random Rand;

        private const int NominalWidth = 500;
        private const int NominalHeight = 700;

        private float ProjectionWidth;
        private float ProjectionHeight;

        private float
            x_board = 250,
            //x_board = 290,
            y_board = 690
           //y_board = 500
            , size_board_x = 70;

        private bool ball_moving = false;
        private float x_ball = 290, 
            y_ball = 672;
        //y_ball = 470;
        private float alpha = 3.1415f * 2.0f /8;
        private int speed_ball = 10;

        private List<float> x_block;
        private List<float> y_block;
        private List<Color> color_block;
        private float size_block_x = 70, size_block_y = 40;

        private bool game_over = false;

        int hearts = 3;
        int score = 0;
        

        [STAThread]
        static void Main()
        {
            using (var Game = new Game())
            {
                Game.Run(60, 0);
            }
        }

        public Game()
      : base(NominalWidth, NominalHeight, GraphicsMode.Default, "EVM8")
        {
            VSync = VSyncMode.On;

            Mouse.ButtonDown += new EventHandler<MouseButtonEventArgs>(Mouse_ButtonDown);
            Mouse.ButtonUp += new EventHandler<MouseButtonEventArgs>(Mouse_ButtonUp);
            Mouse.Move += new EventHandler<MouseMoveEventArgs>(Mouse_Move);

            Mouse.ButtonDown += new EventHandler<MouseButtonEventArgs>(Mouse_ButtonDown);
            Mouse.ButtonUp += new EventHandler<MouseButtonEventArgs>(Mouse_ButtonUp);
            Mouse.Move += new EventHandler<MouseMoveEventArgs>(Mouse_Move);

            
            bmp = new Bitmap(200, 50);
            Graphics g = Graphics.FromImage(bmp);
            g.FillRectangle(new SolidBrush(Color.FromArgb(50, 30, 30)), 0, 0, 200, 50);
            g.DrawString("Score: 0", new Font("Arial", 30), new SolidBrush(Color.FromArgb(250, 180, 180)), 10, 0);
            bytes = ToByte(bmp);
            
            bmp_go = new Bitmap(300, 50);

            g = Graphics.FromImage(bmp_go);
            g.FillRectangle(new SolidBrush(Color.FromArgb(255,255,255)), 0, 0, 300, 50);
            bytes_go = ToByte(bmp_go);

            Keyboard.KeyDown += new EventHandler<KeyboardKeyEventArgs>(OnKeyDown);
        }
        protected void OnKeyDown(object Sender, KeyboardKeyEventArgs E)
        {
                if ((Key.Enter == E.Key) )
                {
                game_over = false;
                hearts = 3;
                score = 0;
                bmp = new Bitmap(200, 50);
                Graphics g = Graphics.FromImage(bmp);
                g.FillRectangle(new SolidBrush(Color.FromArgb(50, 30, 30)), 0, 0, 200, 50);
                g.DrawString("Score: 0", new Font("Arial", 30), new SolidBrush(Color.FromArgb(250, 180, 180)), 10, 0);
                bytes = ToByte(bmp);

                bmp_go = new Bitmap(300, 50);

                g = Graphics.FromImage(bmp_go);
                g.FillRectangle(new SolidBrush(Color.FromArgb(255, 255, 255)), 0, 0, 300, 50);
                bytes_go = ToByte(bmp_go);
                New();
            }
        }
        public static byte[] ToByte(Bitmap bmp)
        {
            int size = bmp.Height * bmp.Width * 4;
            byte[] pArray = new byte[size];

            for (int i = 0; i < bmp.Width; i++)
            {
                for (int j = 0; j < bmp.Height; j++)
                {
                    //int k = j * bmp.Width + i; // wrong way
                    int k = ((bmp.Height-1-j) * bmp.Width +i) * 4;

                    pArray[k] = bmp.GetPixel(i, j).R;
                    pArray[k + 1] = bmp.GetPixel(i, j).G;
                    pArray[k + 2] = bmp.GetPixel(i, j).B;
                    pArray[k + 3] = bmp.GetPixel(i, j).A;

                }

            }
            return pArray;
        }
        protected override void OnLoad(EventArgs E)
        {
            base.OnLoad(E);
            GL.Enable(EnableCap.Texture2D);
            GL.Enable(EnableCap.Blend);

            GL.BlendFunc(BlendingFactorSrc.SrcAlpha, BlendingFactorDest.OneMinusSrcAlpha);
            New();
        }

        protected override void OnResize(EventArgs E)
        {
            base.OnResize(E);
            GL.Viewport(ClientRectangle.X, ClientRectangle.Y, ClientRectangle.Width, ClientRectangle.Height);

            ProjectionWidth = NominalWidth;
            ProjectionHeight = (float)ClientRectangle.Height / (float)ClientRectangle.Width * ProjectionWidth;
            if (ProjectionHeight < NominalHeight)
            {
                ProjectionHeight = NominalHeight;
                ProjectionWidth = (float)ClientRectangle.Width / (float)ClientRectangle.Height * ProjectionHeight;
            }
        }

        protected override void OnUpdateFrame(FrameEventArgs E)
        {
            base.OnUpdateFrame(E);
        }

        double x = 0, y = 0;
        protected override void OnRenderFrame(FrameEventArgs E)
        {
            base.OnRenderFrame(E);

            GL.ClearColor(Color4.White);
            GL.Clear(ClearBufferMask.ColorBufferBit | ClearBufferMask.DepthBufferBit);

            var Modelview = Matrix4.LookAt(Vector3.Zero, Vector3.UnitZ, Vector3.UnitY);
            GL.MatrixMode(MatrixMode.Modelview);
            GL.LoadMatrix(ref Modelview);


            var Projection = Matrix4.CreateOrthographic(-ProjectionWidth, -ProjectionHeight, -1, 1);
            GL.MatrixMode(MatrixMode.Projection);
            GL.LoadMatrix(ref Projection);
            GL.Translate(ProjectionWidth / 2, -ProjectionHeight / 2, 0);

            GL.RasterPos2(150, 500);
            GL.PixelZoom(1, 1);
            GL.DrawPixels(300, 50, PixelFormat.Bgra, PixelType.UnsignedByte, bytes_go);

            if ((x_block.Count == 0 || hearts == 0) && !game_over)
            {
                if (x_block.Count == 0)
                {
                    Graphics g = Graphics.FromImage(bmp_go);
                    g.FillRectangle(new SolidBrush(Color.FromArgb(255, 255, 255)), 0, 0, 300, 50);
                    g.DrawString("Good Job!" , new Font("Arial", 40), new SolidBrush(Color.FromArgb(200, 150, 50)), -10, 0);
                    bytes_go = ToByte(bmp_go);
                }
                else
                {
                    Graphics g = Graphics.FromImage(bmp_go);
                    g.FillRectangle(new SolidBrush(Color.FromArgb(255,255,255)), 0, 0, 300, 50);
                    g.DrawString("Lose =(", new Font("Arial", 40), new SolidBrush(Color.FromArgb(200, 150, 50)), -10, 0);
                    bytes_go = ToByte(bmp_go);
                }

                x_ball = 250;
                y_ball = 672;
                x_board = 250;
                alpha = 3.1415f / 4;
                ball_moving = false;
                game_over = true;
            }
            if (ball_moving)
            {
                for (int step = 0; step < speed_ball; step++)
                {
                    for (int i = 0; i < x_block.Count; i++)
                    {
                        if (y_ball - 5 - 2 < y_block[i] + size_block_y / 2
                            && y_ball - 5 - 2 > y_block[i] - size_block_y / 2
                            && y_ball - 5 > y_block[i] + size_block_y / 2
                            && ((x_ball - 6 < x_block[i] + size_block_x / 2
                            && x_ball - 6 > x_block[i] - size_block_x / 2)
                            || (x_ball + 6 < x_block[i] + size_block_x / 2
                            && x_ball + 6 > x_block[i] - size_block_x / 2))
                            &&alpha<3.1415f)
                        {
                            x_block.RemoveAt(i);
                            y_block.RemoveAt(i);
                            color_block.RemoveAt(i);
                            alpha = 3.1415f * 2.0f - alpha;
                            score++;
                            Graphics g = Graphics.FromImage(bmp);
                            g.FillRectangle(new SolidBrush(Color.FromArgb(50, 30, 30)), 0, 0, 200, 50);
                            g.DrawString("Score: "+score, new Font("Arial", 30), new SolidBrush(Color.FromArgb(250, 180, 180)), 10, 0);
                            bytes = ToByte(bmp);
                            break;
                        }
                        if (y_ball + 5 + 2 < y_block[i] + size_block_y / 2
                            && y_ball + 5 + 2 > y_block[i] - size_block_y / 2
                            && y_ball + 5 < y_block[i] - size_block_y / 2
                            && ((x_ball - 5 < x_block[i] + size_block_x / 2
                            && x_ball - 5 > x_block[i] - size_block_x / 2)
                            || (x_ball + 5 < x_block[i] + size_block_x / 2
                            && x_ball + 5 > x_block[i] - size_block_x / 2))
                            && alpha > 3.1415f)
                        {
                            x_block.RemoveAt(i);
                            y_block.RemoveAt(i);
                            color_block.RemoveAt(i);
                            alpha = 3.1415f * 2.0f - alpha;
                            score++;
                            Graphics g = Graphics.FromImage(bmp);
                            g.FillRectangle(new SolidBrush(Color.FromArgb(50, 30, 30)), 0, 0, 200, 50);
                            g.DrawString("Score: " + score, new Font("Arial", 30), new SolidBrush(Color.FromArgb(250, 180, 180)), 10, 0);
                            bytes = ToByte(bmp);
                            break;
                        }
                        if (x_ball + 5 + 2 < x_block[i] + size_block_x / 2
                            && x_ball + 5 + 2 > x_block[i] - size_block_x / 2
                            && x_ball + 5 < x_block[i] - size_block_x / 2
                            && ((y_ball - 5 < y_block[i] + size_block_y / 2
                            && y_ball - 5 > y_block[i] - size_block_y / 2)
                            || (y_ball + 5 < y_block[i] + size_block_y / 2
                            && y_ball + 5 > y_block[i] - size_block_y / 2))
                            && Math.Cos(alpha) >0)
                        {
                            x_block.RemoveAt(i);
                            y_block.RemoveAt(i);
                            color_block.RemoveAt(i);
                            if (alpha < 3.1415f)
                                alpha = 3.1415f - alpha;
                            else alpha = 3.1415f * 3 - alpha;
                            score++;
                            Graphics g = Graphics.FromImage(bmp);
                            g.FillRectangle(new SolidBrush(Color.FromArgb(50, 30, 30)), 0, 0, 200, 50);
                            g.DrawString("Score: " + score, new Font("Arial", 30), new SolidBrush(Color.FromArgb(250, 180, 180)), 10, 0);
                            bytes = ToByte(bmp);
                            break;
                        }
                        if (x_ball - 5 - 2 < x_block[i] + size_block_x / 2
                            && x_ball - 5 - 2 > x_block[i] - size_block_x / 2
                            && x_ball - 5 > x_block[i] + size_block_x / 2
                            && ((y_ball - 5 < y_block[i] + size_block_y / 2
                            && y_ball - 5 > y_block[i] - size_block_y / 2)
                            || (y_ball + 5 < y_block[i] + size_block_y / 2
                            && y_ball + 5 > y_block[i] - size_block_y / 2))
                            && Math.Cos(alpha) < 0)
                        {
                            x_block.RemoveAt(i);
                            y_block.RemoveAt(i);
                            color_block.RemoveAt(i);
                            if (alpha < 3.1415f)
                                alpha = 3.1415f - alpha;
                            else alpha = 3.1415f * 3 - alpha;
                            score++;
                            Graphics g = Graphics.FromImage(bmp);
                            g.FillRectangle(new SolidBrush(Color.FromArgb(50, 30, 30)), 0, 0, 200, 50);
                            g.DrawString("Score: " + score, new Font("Arial", 30), new SolidBrush(Color.FromArgb(250, 180, 180)), 10, 0);
                            bytes = ToByte(bmp);
                            break;
                        }
                    }

                    if (x_ball + (float)Math.Cos(alpha)  < Width - 8
                        && x_ball + (float)Math.Cos(alpha)  > 8)
                    {
                        x_ball += (float)Math.Cos(alpha) ;                    }
                    else
                    {
                        if (alpha < 3.1415f) alpha = 3.1415f - alpha;
                        else alpha = 3.1415f * 3 - alpha;
                    }
                    if (y_ball - (float)Math.Sin(alpha)  < Height - 26
                        && y_ball - (float)Math.Sin(alpha)  > 58)
                    {
                        y_ball -= (float)Math.Sin(alpha) ;
                    }
                    else
                    {
                        if (y_ball - (float)Math.Sin(alpha)  > Height - 26)
                        {
                            if (x_board - size_board_x < x_ball && x_board + size_board_x > x_ball)
                            {
                                alpha = ((x_board + size_board_x - x_ball-80) / size_board_x) * 3.1415f / 2+1.5f;
                            }
                            else
                            {
                                x_ball = 250;
                                y_ball = 672;
                                x_board = 250;
                                alpha = 3.1415f / 4;
                                ball_moving = false;
                                hearts--;
                            }
                        }
                        else
                            alpha = 3.1415f * 2.0f - alpha;
                    }
                }
            }
            //ball
            for(int j = 0; j < 10; j++)
            {
                GL.Color3(j/10f, 0.0f, 0.0f);
                GL.Begin(BeginMode.TriangleFan);
                GL.Vertex2(x_ball, y_ball);
                for (int i = 0; i <= 50; i++)
                {
                    float a = (float)i / 50.0f * 3.1415f * 2.0f;
                    GL.Vertex2(Math.Cos(a) * (10-j) + x_ball, Math.Sin(a) * (10 - j) + y_ball);
                }
                GL.End();
            }

            //board
            GL.Color3(0.1, 0.1, 1.0);
            GL.Begin(BeginMode.Quads);
            GL.Vertex2(x_board - size_board_x+2, y_board - 8 + 2);
            GL.Vertex2(x_board + size_board_x - 8, y_board - 8 + 2);
            GL.Vertex2(x_board + size_board_x - 8, y_board + 8 - 2);
            GL.Vertex2(x_board - size_board_x +2, y_board + 8 - 2);
            GL.Color3(0.0, 0.0, 1.0);
            GL.Begin(BeginMode.Quads);
            GL.Vertex2(x_board - size_board_x+2 + 2, y_board - 8+2 + 2);
            GL.Vertex2(x_board + size_board_x-2 - 8, y_board - 8+2 + 2);
            GL.Vertex2(x_board + size_board_x-2 - 8, y_board + 8 - 2 - 2);
            GL.Vertex2(x_board - size_board_x+2 + 2, y_board + 8-2 - 2);
            GL.End();

            //blocks
            GL.Begin(BeginMode.Quads);
            for (int i = 0; i < x_block.Count; i++)
            {
                GL.Color3(Color.FromArgb(color_block[i].R, color_block[i].G+20, color_block[i].B));
                GL.Vertex2(x_block[i] - size_block_x / 2 + 1, y_block[i] - size_block_y / 2 + 1);
                GL.Vertex2(x_block[i] + size_block_x / 2 - 1, y_block[i] - size_block_y / 2 + 1);
                GL.Vertex2(x_block[i] + size_block_x / 2 - 1, y_block[i] + size_block_y / 2 - 1);
                GL.Vertex2(x_block[i] - size_block_x / 2 + 1, y_block[i] + size_block_y / 2 - 1);

                GL.Color3(color_block[i]);
                GL.Vertex2(x_block[i] - size_block_x / 2 + 5, y_block[i] - size_block_y / 2 + 5);
                GL.Vertex2(x_block[i] + size_block_x / 2 - 5, y_block[i] - size_block_y / 2 + 5);
                GL.Vertex2(x_block[i] + size_block_x / 2 - 5, y_block[i] + size_block_y / 2 - 5);
                GL.Vertex2(x_block[i] - size_block_x / 2 + 5, y_block[i] + size_block_y / 2 - 5);

            }
            GL.Color3(Color.FromArgb(30,30,50));
            GL.Vertex2(0,0);
            GL.Vertex2(Width,0);
            GL.Vertex2(Width,50);
            GL.Vertex2(0,50);

            GL.End();
            //hearts
            for (int i = 0; i < hearts; i++)
            {
                GL.Begin(BeginMode.Polygon);
                GL.Color3(Color.FromArgb(255, 0, 0));
                GL.Vertex2(14+i*50, 7);
                GL.Vertex2(21 + i * 50, 7);
                GL.Vertex2(35 + i * 50, 7);
                GL.Vertex2(42 + i * 50, 7);
                GL.Vertex2(49 + i * 50, 14);
                GL.Vertex2(49 + i * 50, 21);
                GL.Vertex2(28 + i * 50, 42);
                GL.Vertex2(7 + i * 50, 21);
                GL.Vertex2(7 + i * 50, 14);
                GL.End();

                GL.Begin(BeginMode.TriangleFan);
                GL.Color3(Color.FromArgb(30, 30, 50));
                GL.Vertex2(21 + i * 50, 7);
                GL.Vertex2(28 + i * 50, 14);
                GL.Vertex2(35 + i * 50, 7);
                GL.End();
            }
            GL.RasterPos2(300, 50);
            GL.PixelZoom(1, 1);
            GL.DrawPixels(200, 50, PixelFormat.Bgra, PixelType.UnsignedByte, bytes);

            SwapBuffers();
        }
        private void New()
        {
            Rand = new Random();

            x_block = new List<float>();
            y_block = new List<float>();
            color_block = new List<Color>();
            for (int i = 0; i < 5; i++)
            {
                for (int j = 0; j < 7; j++)
                {
                    x_block.Add(j * size_block_x + size_block_x / 2+5);
                    y_block.Add(i * (size_block_y+0) + size_block_y / 2+50);
                    color_block.Add(Color.FromArgb(i * 10, i * 20 + 50, i * 10));
                }
            }
            //for (int i = 0; i < 3; i++)
            //{
            //    x_block.RemoveAt(32);
            //    y_block.RemoveAt(32);
            //    color_block.RemoveAt(32);
            //}

        }
        void Mouse_Move(object sender, MouseMoveEventArgs e)
        {
            // Now use mouse_delta to move the camera
            if (Mouse.X > size_board_x && Mouse.X < Width - size_board_x)
            {
                x_board = Mouse.X;
            }
            else if (Mouse.X <= size_board_x)
            {
                x_board = size_board_x + 1;
            }
            else
            {
                x_board = Width - size_board_x - 1;
            }
            if (!ball_moving)
            {
                if (Mouse.X > size_board_x && Mouse.X < Width - size_board_x)
                {
                    x_ball = Mouse.X;
                }
                else if (Mouse.X <= size_board_x)
                {
                    x_ball = size_board_x + 1;
                }
                else
                {
                    x_ball = Width - size_board_x - 1;
                }
            }
        }

        void Mouse_ButtonUp(object sender, MouseButtonEventArgs e)
        {
            switch (e.Button)
            {
                case MouseButton.Left:
                    {
                        //start moving
                        break;

                    }
                case MouseButton.Middle:
                    ///camera_mode = ECameraMode.CAMERA_DOLLY;
                    break;
                case MouseButton.Right:
                    //camera_mode = ECameraMode.CAMERA_ORBIT;
                    break;
            }

        }

        void Mouse_ButtonDown(object sender, MouseButtonEventArgs e)
        {
            switch (e.Button)
            {
                case MouseButton.Left:
                    {
                        if(!game_over)
                        ball_moving = true;
                        speed_ball--;
                        break;
                    }
                case MouseButton.Middle:
                    ///camera_mode = ECameraMode.CAMERA_DOLLY;
                    break;
                case MouseButton.Right:
                    //camera_mode = ECameraMode.CAMERA_ORBIT;
                    speed_ball++;
                    break;
            }
        }
    }

}