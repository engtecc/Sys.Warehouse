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
    public partial class Editar : Form
    {
        public Editar()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            EditarProduto janela = new EditarProduto();
            janela.ShowDialog();
        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {

        }
    }
}
