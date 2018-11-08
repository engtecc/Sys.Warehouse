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
    public partial class Login : Form
    {
        public Login()
        {
            InitializeComponent();
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            RecuperarSenha janela = new RecuperarSenha();
            janela.ShowDialog();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            TelaPrincipalAdm janela = new TelaPrincipalAdm();
            janela.ShowDialog();
        }
    }
}
