using System;
using System.Windows.Forms;

namespace aisd2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string str = textBox1.Text;
            int n=0;
            try
            {
                n = Convert.ToInt32(str);
            }catch(Exception ex)
            {
                label1.Text="введено не число";
            }
            double s = 0;
            for (int i = 1; i <= n; i++) s = s + ((Math.Cos(2 * Math.PI * i / 3)) / Math.Sqrt(i * i + 1));
            label1.Text = "s = " + s;
        }
    }
}
