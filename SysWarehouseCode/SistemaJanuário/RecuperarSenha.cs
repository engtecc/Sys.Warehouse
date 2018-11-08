using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SistemaJanuário
{
    public partial class RecuperarSenha : Form
    {
        public RecuperarSenha()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            RedefinirSenha janela = new RedefinirSenha();
            janela.ShowDialog();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Login janela = new Login();
            janela.ShowDialog();
        }
    }
}
