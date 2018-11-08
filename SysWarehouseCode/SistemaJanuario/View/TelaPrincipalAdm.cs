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
    public partial class TelaPrincipalAdm : Form
    {
        public TelaPrincipalAdm()
        {
            InitializeComponent();
        }

        private void pictureBox7_Click(object sender, EventArgs e)
        {
            CadastroFuncionario janela = new CadastroFuncionario();
            janela.ShowDialog();
        }

        private void pictureBox4_Click(object sender, EventArgs e)
        {
            CadastroFornecedor janela = new CadastroFornecedor();
            janela.ShowDialog();
        }

        private void pictureBox8_Click(object sender, EventArgs e)
        {
            CadastroProduto janela = new CadastroProduto();
            janela.ShowDialog();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            CadastroCliente janela = new CadastroCliente();
            janela.ShowDialog();
        }

        private void pictureBox5_Click(object sender, EventArgs e)
        {
            VendaRapida janela = new VendaRapida();
            janela.ShowDialog();
        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {
            Pesquisa janela = new Pesquisa();
            janela.ShowDialog();
        }

        private void pictureBox6_Click(object sender, EventArgs e)
        {
            Editar janela = new Editar();
            janela.ShowDialog();
        }

        private void pictureBox10_Click(object sender, EventArgs e)
        {
            Relatorio janela = new Relatorio();
            janela.ShowDialog();
        }

        private void pictureBox9_Click(object sender, EventArgs e)
        {
            LancamentoContas janela = new LancamentoContas();
            janela.ShowDialog();
        }

        private void pictureBox13_Click(object sender, EventArgs e)
        {
            LancamentoContas janela = new LancamentoContas();
            janela.ShowDialog();
        }

        private void listBox2_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void listBox3_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void label10_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
