# -*- coding: utf-8 -*-
"""fuzzy mamdani.ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/1lkPZbXDaaK4S45h97dQQ0pNruqo3xAgo
"""

!pip install -U scikit-fuzzy

# Commented out IPython magic to ensure Python compatibility.
import numpy as np
import skfuzzy as fuzz
import matplotlib.pyplot as plt
# %matplotlib inline

x_minta = np.arange(0, 25, 1)
x_sedia = np.arange(0, 20, 1)
x_prod = np.arange(0, 30, 1)

minta_turun = fuzz.trapmf(x_minta, [0,0,6,19])
minta_naik = fuzz.trapmf(x_minta, [6,19,25,25])

sedia_turun = fuzz.trapmf(x_sedia, [0,0,2,17])
sedia_naik = fuzz.trapmf(x_sedia, [2,17,20,20])

prod_kurang = fuzz.trapmf(x_prod, [0,0,10,25])
prod_tambah = fuzz.trapmf(x_prod, [10,25,30,30])

fig, (ax0,ax1) = plt.subplots(nrows=2, figsize=(8,6))

ax0.plot(x_minta, minta_turun, 'b', linewidth=1.5, label='turun')
ax0.plot(x_minta, minta_naik, 'g', linewidth=1.5, label='naik')

ax0.set_title('permintaan')
ax0.legend()

ax1.plot(x_sedia, sedia_turun, 'b', linewidth=1.5, label='turun')
ax1.plot(x_sedia, sedia_naik, 'g', linewidth=1.5, label='naik')

ax1.set_title('persediaan')
ax1.legend()

for ax in (ax0, ax1):
  ax.spines['top'].set_visible(False)
  ax.spines['right'].set_visible(False)
  ax.get_xaxis().tick_bottom()
  ax.get_yaxis().tick_left()

plt.tight_layout()

minta_input = 19
sedia_input = 2

minta_degree_turun = fuzz.interp_membership(x_minta, minta_turun, minta_input)
minta_degree_naik = fuzz.interp_membership(x_minta, minta_naik, minta_input)

sedia_degree_turun = fuzz.interp_membership(x_sedia, sedia_turun, sedia_input)
sedia_degree_naik = fuzz.interp_membership(x_sedia, sedia_naik, sedia_input)

print('permintaan :')
print('turun :', minta_degree_turun)
print('naik :', minta_degree_naik)
print("")
print('persediaan :')
print('sedikit :', sedia_degree_turun)
print('banyak :', sedia_degree_naik)

active_rule1 = np.fmin(minta_degree_turun, sedia_degree_naik)
active_rule2 = np.fmin(minta_degree_turun, sedia_degree_turun)
active_rule3 = np.fmin(minta_degree_naik, sedia_degree_naik)
active_rule4 = np.fmin(minta_degree_naik, sedia_degree_turun)

prod_activation_kurang1 = np.fmin(active_rule1, prod_kurang)
prod_activation_kurang2 = np.fmin(active_rule2, prod_kurang)
prod_activation_tambah1 = np.fmin(active_rule3, prod_tambah)
prod_activation_tambah2 = np.fmin(active_rule4, prod_tambah)

prod0 = np.zeros_like(x_prod)

fig, ax0 = plt.subplots(figsize=(8,3))

ax0.fill_between(x_prod, prod0, prod_activation_kurang1, facecolor='b', alpha=0.7)
ax0.plot(x_prod, prod_kurang, 'b', linewidth=0.5, linestyle='--')
ax0.fill_between(x_prod, prod0, prod_activation_kurang2, facecolor='g', alpha=0.7)
ax0.plot(x_prod, prod_kurang, 'g', linewidth=0.5, linestyle='--')
ax0.fill_between(x_prod, prod0, prod_activation_tambah1, facecolor='r', alpha=0.7)
ax0.plot(x_prod, prod_tambah, 'r', linewidth=0.5, linestyle='--')
ax0.fill_between(x_prod, prod0, prod_activation_tambah2, facecolor='y', alpha=0.7)
ax0.plot(x_prod, prod_tambah, 'y', linewidth=0.5, linestyle='--')

for ax in (ax0,):
  ax.spines['top'].set_visible(False)
  ax.spines['right'].set_visible(False)
  ax.get_xaxis().tick_bottom()
  ax.get_yaxis().tick_left()

plt.tight_layout()

aggregated = np.fmax(prod_activation_tambah2, np.fmax(prod_activation_tambah1, np.fmax(prod_activation_kurang1, prod_activation_kurang2)))

prod = fuzz.defuzz(x_prod, aggregated, 'centroid')
prod_activation = fuzz.interp_membership(x_prod, aggregated, prod)
print("Hasil z :", (prod))