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
    public partial class VendaRapida : Form
    {
        public VendaRapida()
        {
            InitializeComponent();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Venda janela = new Venda();
            janela.ShowDialog();
        }
    }
}
