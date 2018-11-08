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
    public partial class Venda : Form
    {
        public Venda()
        {
            InitializeComponent();
        }

        private void pictureBox7_Click(object sender, EventArgs e)
        {

        }

        private void button4_Click(object sender, EventArgs e)
        {
            CadastroCliente janela = new CadastroCliente();
            janela.ShowDialog();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Emprestimo janela = new Emprestimo();
            janela.ShowDialog();
        }
    }
}
